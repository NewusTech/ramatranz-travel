<?php

namespace App\Http\Livewire\User\Form;

use App\Models\JobPosition;
use App\Models\LembagaPenyalur;
use App\Models\Role;
use App\Models\RoleGroup;
use App\Models\UnitTna;
use App\Models\User;
use App\Models\Zona;
use App\Notifications\addUser;
use Livewire\Component;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role as ModelsRole;

class FormUser extends Component
{
    public
        $name,
        $email,
        $password,
        // $wa,
        // $banks = [],
        // $bank,
        $selectedItem;
    public $role, $roles, $userRole;
    public $isZonable = false;

    public function mount($id = null)
    {
        $this->roles = Role::all();
        // $this->banks = LembagaPenyalur::all();
        // dd($this->zonas);
        // $this->zonas = Zona::all();
        if ($id !== null) {
            $user = User::findOrFail($id);
            $this->selectedItem = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            // $this->wa = $user->wa;
            $this->role = $user->roles->first()->id;
        }
    }
    public function render()
    {
        return view('livewire.user.form.form-user', [
            'title' => 'Pengguna'
        ]);
    }

    public function updatedRole()
    {
        $this->userRole = ModelsRole::findById((int)$this->role)->name;
    }

    public function save()
    {
        $this->updatedJob();
        if ($this->selectedItem === null) {
            $this->validate([
                'name' => 'required|min:3',
                'email' => ['required', 'email', ValidationRule::unique('users')->ignore($this->selectedItem)],
                'role' => 'required'
            ]);


            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                // 'lembaga_penyalur_id' => $this->bank,
                'email_verified_at' => now(),
                'password' => Hash::make($this->email),
                'remember_token' => Str::random(10),
            ]);
            $user->assignRole($this->role);
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "User has been added"]);
            $user->notify(new addUser($user));
            $this->emit('refresh');
        } else {

            $this->validate([
                'name' => 'required|min:3',
                'email' => ['required', 'email', ValidationRule::unique('users')->ignore($this->selectedItem)],
                'role'  => 'required'
            ]);
            User::where('id', $this->selectedItem)->update([
                'name' => $this->name,
                'email' => $this->email,
                // 'lembaga_penyalur_id' => $this->bank,
            ]);
            if ($this->password !== null) {
                User::where('id', $this->selectedItem)->update([
                    'password' => password_hash($this->password, PASSWORD_DEFAULT)
                ]);
            }
            $user = User::find($this->selectedItem);
            $user->syncRoles($this->role);
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "User's data has been updated"]);
        }
        $this->clear();
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'inputModal']);
        redirect(route('user'));
    }

    public function clear()
    {
        $this->reset([
            'name',
            'role',
            'email',
            'password',
            // 'wa',
            'selectedItem',
        ]);
    }
}
