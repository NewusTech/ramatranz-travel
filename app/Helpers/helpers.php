<?php

use App\Models\CashierSession;
use App\Models\Config;
use App\Models\Transaction;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

if(! function_exists('sequence_num')){
    function sequence_num ($input, $pad_len = 7, $prefix = null) {
        if ($pad_len <= strlen($input))
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

        if (is_string($prefix))
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }
}

if(! function_exists('get_route')){
    function get_route ($form = null, $input = null,$identifier = null, $edit = false) {
    $url = "";

    if($form == null){
        return null;
    }

    if($form == 'form1' && $input="submit"){
        if($edit){
            $url = route('submitform1',['id' => $identifier, 'edit' => true]);
        }
        else{
            $url = route('submitform1',['id' => $identifier]);
        }
    }
    
    if($form == 'form2' && $input == 'submit'){
        if($edit){
            $url = route('submitform2', ['id' => $identifier, 'edit' => true]);
        }
        else{
            $url = route('submitform2', ['id' => $identifier]);
        }
    }

    if($form == 'form2' && $input == 'approval'){
        $url = route('approveform2', $identifier);
    }
    
    if($form == 'form3' && $input == 'submitbik'){
        $url = route('submitform3bik', ['id' => $identifier]);
    }
    
    if($form == 'form3' && $input == 'submithd'){
        $url = route('submitform3hd', ['id' => $identifier]);
    }
    
    if($form == 'form3' && $input == 'approval'){
        $url = route('form3approval', ['id' => $identifier]);
    }
    
    if($form == 'form4' && $input == 'submitbiu'){
        $url = route('submitform4biu', ['id' => $identifier]);
    }
    
    if($form == 'form4' && $input == 'submit'){
        $url = route('submitform4biu', ['id' => $identifier, 'edit' => true]);
    }
    
    if($form == 'form4' && $input == 'submithm'){
        $url = route('submitform4hm', ['id' => $identifier]);
    }
    if($form == 'form4' && $input == 'approval'){
        $url = route('form4approval', ['id' => $identifier]);
    }
    
    if($form == 'form5' && $input == 'survey'){
        $url = route('form5.assesment', $identifier);
    }
    if($form == 'form5' && $input == 'approval'){
        $url = route('form5.approval', $identifier);
    }
    if($form == 'form6' && $input == 'form6'){
        $url = route('form6.program', $identifier);
    }
    if($form == 'form6' && $input == 'review'){
        $url = route('form6.review', $identifier);
    }
    if($form == 'form7' && $input == 'approval'){
        $url = route('form7.submit', $identifier);
    }

    return $url;

       
    }
}

if( !function_exists('company_config')){
    function company_config($key){
        $config =  Config::where('key', $key)->first()->value;
        return $config;
        Cache::remember($key, now()->addDays(5), function () use ($key) {
            });
        // return Config::where('key', $key)->first()->value;
    }
}

if( !function_exists('autofill')){
    function autofill($key, $value=null){
            
        $file = file_get_contents(resource_path('autofill.json'));
        $json = json_decode($file,true);
        if($value !== null){
            $val = in_array($value, $json[$key]);
            if($val){
                return true;
            }
            else{
                return false;
            }
        }
         return $json[$key];
        // Cache::remember('autofill', now()->addDays(30), function () use ($key, $value) {
        // });
    }
}

if( !function_exists('update_autofill')){
    function update_autofill($key, $value){
        if($value == null){
            return false;
        }
       
            $path = resource_path('autofill.json');

            $json = json_decode(file_get_contents($path), true);
            if(is_array($value)){
                foreach($value as $v){
                    array_push($json[$key], $v);
                }
            }
            elseif(!in_array($value, $json[$key])){
                $json[$key][] = $value;
            }
            Log::info($json[$key]);
            $newJson = json_encode(super_unique($json), JSON_PRETTY_PRINT);
            Log::info($newJson);
            return file_put_contents($path, stripslashes($newJson));

            return false;

    }
}




if( !function_exists('super_unique')){
    function super_unique($array)
    {

        $result = array_map("unserialize", array_unique(array_map("serialize", $array)));
        foreach ($result as $key => $value)
        {
            if ( is_array($value) )
            {
            $result[$key] = super_unique($value);
            }
        }

        return $result;
    }
}

if( !function_exists('isAdmin')){
    function isAdmin(){
        if(!auth()->user()){
            return FALSE;
        }
        return in_array('Superadmin', auth()->user()->roles->pluck('name')->toArray());
    }
}

if( !function_exists('sumArray')){
   function sumArray($array, $key)
    {
        $total = 0;
        foreach($array as $a){
            $total = $total + $a[$key];
        }

        return $total;
    }
}

if( !function_exists('markNotificationAsRead')){
   function markNotificationAsRead($index = null)
    {
        if($index == null){
            return auth()->user()->unreadNotifications->markAsRead();
        }
        else{
            return auth()->user()->unreadNotifications[$index]->markAsRead();

        }
    }
}

if( !function_exists('generateQr')){
    function generateQr($text, $size = 70){
         $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($text)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize($size)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);
        $result->saveToFile(storage_path().'/qrcode.png');
        return $result->getDataUri();
    }
}

if( !function_exists('multi_array_key_exists')){
    function multi_array_key_exists(array $path, array $array): bool
    {
        if (empty($path)) {
            return false;
        }
        foreach ($path as $key) {
            if (isset($array[$key]) || array_key_exists($key, $array)) {
                $array = $array[$key];
                continue;
            }

            return false;
        }

        return true;
    }
}

if( !function_exists('searchForIdinArray')){
    function searchForIdinArray($search_value, $array, $id_path = array()) {
  
    // Iterating over main array
        foreach ($array as $key1 => $val1) {
    
            $temp_path = $id_path;
            
            // Adding current key to search path
            array_push($temp_path, $key1);
    
            // Check if this value is an array
            // with atleast one element
            if(is_array($val1) and count($val1)) {
    
                // Iterating over the nested array
                foreach ($val1 as $key2 => $val2) {
    
                    if($val2 == $search_value) {
                            
                        // Adding current key to search path
                        array_push($temp_path, $key2);
                            
                        return join(",", $temp_path);
                    }
                }
            }
            
            elseif($val1 == $search_value) {
                return join(" --> ", $temp_path);
            }
        }
        
        return null;
    }
}



?>
