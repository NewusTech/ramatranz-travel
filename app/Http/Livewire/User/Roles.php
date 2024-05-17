<?php

namespace App\Http\Livewire\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use App\Models\Role;

class Roles extends Component
{
    public $name,  $force;
    public $title="User's Roles";

    public $selectedItem;
    public $selectedRole;
    public $selectedItems = [];

    protected $listeners = ['restore', 'open','confirm','delete','getPermissions'];

   public function mount(){
   }
     
    public function render()
    {
        $act =[];
        $permissions = Permission::all();

        foreach ($permissions as $key=>$p) {
            if(strpos($p->name, '.') !== false){
                $a = explode(".",$p->name);
                $act[$a[0]]['collections'] [$a[1]] = $p->display;
            }
            else{
                $act[$p->name]['display'] = $p->display;

            }
        }
      
        return view('livewire.user.roles',[
            
            'roles' => Role::count(),
            'trash' => Role::onlyTrashed()->count(),
            'actions' => $act

        ]);
        
    }

    public function multiple(){
        
    }

    public function updatePermission(){
        
        $role = Role::find($this->selectedItem);
        $role->syncPermissions($this->selectedItems);
        
        $this->clearAll();
        $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"permission has been updated"]);
        $this->dispatchBrowserEvent('closeModal',['modal' => 'permissionsModal']);
        $this->emit('refresh');
    }

    public function clearAll(){
        $this->reset([
            'force',
            'name', 'selectedItems','selectedItem'
        ]);
    }


    public function open($mode, $item = null){

        if($mode == 'update' && $item !== null){
            $role = Role::find($item);
            $this->selectedItem = $role->id;
            $this->name = $role->name;

        }
        $this->dispatchBrowserEvent('openModal',['modal' => 'inputModal']);
    }

    public function confirm($item = null, $multiple = false, $permanently = false){

       $this->force = $permanently;
        $this->selectedItem = $item;
        
        if($item === null && $multiple === true){
            //multiple softDelete
            $this->dispatchBrowserEvent('confirm-delete',['mode' => 'multiple','item' => null, 'for' => 'trash']);
        }
        if($item === null && $multiple === true && $permanently === true){
            //multiple force delete
            $this->dispatchBrowserEvent('confirm-delete',['mode' => 'multiple', 'item' => null, 'for' => 'force']);
        }
        
        if($item !== null && $multiple === false && $permanently === true){
            // single force delete
            $this->dispatchBrowserEvent('confirm-delete',['mode'=>'single','item' => $item, 'for' => 'force']);
        }

        if($item !== null && $multiple === false && $permanently === false){
            $this->dispatchBrowserEvent('confirm-delete',['mode'=>'single','item' => $item, 'for' => 'trash']);
        }
    }

    public function getPermissions($item){
        $this->selectedItem = $item;
        $role = Role::find($this->selectedItem);
        $this->name = $role->name;
        $perm = $role->getAllPermissions();

        foreach($perm as $p){
            $this->selectedItems[] = $p->name;
        }
        $this->dispatchBrowserEvent('openModal',['modal' => 'permissionsModal']);
    }
    
    
   

    public function delete(){
        if($this->force === false){
            Role::where('id', $this->selectedItem)->delete();
        }
        else{
            Role::onlyTrashed()->find($this->selectedItem)->forceDelete();
        }
        $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Role has been deleted"]);
        $this->clearAll();
        $this->emit('refresh');
        return FALSE;
    }

 
    
    public function save(){
        $this->validate([
            'name' => 'required',
        ]);
        if($this->selectedItem === null){
            Role::create(['name'=> $this->name]);
            $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Role has been added"]);
        }
        else{
            Role::where('id', $this->selectedItem)->update(['name'=> $this->name]);
            $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Role has been updated"]);
            
        }
        $this->clearAll();
        $this->dispatchBrowserEvent('closeModal',['modal' => 'inputModal']);
        $this->emit('refresh');
    }

    public function restore($id){
        Role::withTrashed()->find($id)->restore();
        $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Role has been restored"]);
        $this->emit('refresh');

    }
    
    
}
