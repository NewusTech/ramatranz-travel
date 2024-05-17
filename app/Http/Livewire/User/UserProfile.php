<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Notifications\TestUserNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;

    protected $listeners = ['refresh' => '$refresh'];
    public function mount($id = null){

        
        $this->user = ($id === null) ? Auth::user() :  User::findOrFail($id);
        if(!$this->user){
            abort(404);
        }
        // $this->user->notify(new TestUserNotification($this->user));
        // dd($this->user->unreadNotifications);
    }
    public function render()
    {
        return view('livewire.user.user-profile',[
            'title'  => 'Profil Pengguna'
        ]);
    }

    public function hapus($mode){
        if($mode == 'terbaca'){
            auth()->user()->readNotifications()->delete();
            $this->emit('refresh');
        }

        if($mode == 'all'){
            auth()->user()->notifications()->delete();
            $this->emit('refresh');

        }
    }
}
