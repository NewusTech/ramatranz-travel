<?php

namespace App\Http\Livewire\Config;

use App\Mail\TestMail;
use App\Models\Smtp;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EmailTest extends Component
{
    public $smtp;

    public $to, $subject, $themessage;

    public function mount(){
        $this->smtp = Smtp::first();
    }
    public function render()
    {
        return view('livewire.config.email-test');
    }

    public function send(){
        try {
            //code...
            Mail::to($this->to)->send(new TestMail);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
