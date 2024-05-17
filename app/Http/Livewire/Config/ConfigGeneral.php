<?php

namespace App\Http\Livewire\Config;

use App\Models\Config;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConfigGeneral extends Component
{
    
    use WithFileUploads;

    public $title = "Config";
    public $name,
            $logo,
            $tagline,
            $address,
            $phone,
            $current,
            $company,
            $email;

    public function mount(){
        
        $this->logo = $this->current =  Config::where('key','logo')->first()->value;;
        $this->name = Config::where('key','name')->first()->value;;
        $this->company = Config::where('key','company')->first()->value;;
        $this->address = Config::where('key','address')->first()->value;;
        $this->phone = Config::where('key','phone')->first()->value;;
        $this->email = Config::where('key','email')->first()->value;;

    }
    public function render()
    {
        return view('livewire.config.config-general');
    }

    public function save(){
        $this->validate([
            'name' => 'required|min:3',
            'company'   => 'nullable',
            'logo'   => 'nullable|image|max:1024',
            'address'   => 'nullable',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|email',
        ]);
       
        try {
            Config::where('key', 'name')->update(['value' =>$this->name]);
            Config::where('key', 'company')->update(['value' => $this->company]);
            Config::where('key', 'address')->update(['value' => $this->address]);
            Config::where('key', 'email')->update(['value' => $this->email]);
            Config::where('key', 'phone')->update(['value' => $this->phone]);
            if($this->logo){
                $ext = ".".$this->logo->getClientOriginalExtension();
                $filename = "logo".$ext;
                $this->logo->storeAs('public',$filename);
                Config::where('key', 'logo')->update(['value' => $filename]);
            }
            $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Your Business' general Info has been updated"]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th,['config'=>'general']);
            $this->dispatchBrowserEvent('error-izi',['ntitle' => 'Failed', 'nmessage' =>"Your Business' general Info failed to be updated"]);
        }
    }

}
