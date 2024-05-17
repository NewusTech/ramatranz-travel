<?php

namespace App\Http\Livewire\Config;

use App\Mail\TestMail;
use App\Models\Smtp;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ConfigSmtp extends Component
{

    public  $driver,
            $host,
            $port,
            $encryption,
            $username,
            $password,
            $sender_name,
            $sender_email,
            $to,
            $emailTest;

    public function mount(){
        $smtp = Smtp::first();
        $this->driver   = $smtp->driver;
        $this->host = $smtp->host;
        $this->port = $smtp->port;
        $this->encryption   = $smtp->encryption;
        $this->username = $smtp->username;
        $this->password = $smtp->password;
        $this->sender_name  = $smtp->sender_name;
        $this->sender_email = $smtp->sender_email;
    }
    public function render()
    {
        return view('livewire.config.config-smtp');
    }

    public function save(){
        $this->validate([
            "driver" => 'required|string',
            "host" => 'required|string',
            "port" => 'required|string',
            "encryption" => 'required|string',
            "username" => 'required|string',
            "password" => 'required|string',
            "sender_name" => 'required|string',
            "sender_email" => 'required|string|email',
        ]);
        
         try {
           Smtp::first()->update([
                "driver"    => $this->driver,
                "host"  => $this->host,
                "port" => $this->port,
                "encryption" => $this->encryption,
                "username" => $this->username,
                "password" => $this->password,
                "sender_name" => $this->sender_name,
                "sender_email" => $this->sender_email,
           ]);
            $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"SMTP Setting has been updated"]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th,['config'=>'smtp']);
            $this->dispatchBrowserEvent('error-izi',['ntitle' => 'Failed', 'nmessage' =>"SMTP Setting failed to be updated"]);
        }
        
    }

    public function send(){
        try {
            Mail::to($this->to)->send(new TestMail);
            $this->emailTest = "Email sukses terkirim";
        } catch (\Throwable $th) {
            $this->emailTest = "Email gagal terkirim";
            //throw $th;
            Log::error($th);
        }
    }

}
