<?php

namespace App\Http\Livewire\User;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithFileUploads;

class User extends Component
{
    use WithFileUploads;
    public $title, 
      
           $selectedItem;
    public $force = false;
    public $selectedItems = [];

    protected $proxies = '*';
    public $excel;

    protected $listeners = ['confirm','open','delete','deleteSelected','restore','refresh' => '$refresh'];
 
  
    public function mount(){
        $this->title = 'Users';
    }

    public function render()
    {
        return view('livewire.user.user',[
             'users' => ModelsUser::whereHas('roles',function($q){
                 $q->whereNotIn('roles.name' , ['Member']);
             })->count(),
             'trash' => ModelsUser::onlyTrashed()->whereHas('roles',function($q){
                 $q->whereNotIn('roles.name' , ['Member']);
             })->count()
            ]);
    }


    public function restore($id){
        ModelsUser::withTrashed()->find($id)->restore();
        $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Users has been restored"]);
        $this->emit('refresh');
    }

    public function deleteSelected(){

        if($this->force === false){
            Modelsuser::whereIn('id', $this->selectedItems)->delete();
        }
        else{
            Modelsuser::onlyTrashed()->whereIn('id', $this->selectedItems)->forceDelete();

        }
        $this->clear();
        $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"Users has been deleted"]);
        $this->emit('refresh');

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
    
    public function delete(){
        if($this->force === false){
            ModelsUser::where('id', $this->selectedItem)->delete();
        }
        else{
            ModelsUser::onlyTrashed()->find($this->selectedItem)->forceDelete();
        }
        $this->dispatchBrowserEvent('success-izi',['ntitle' => 'Success', 'nmessage' =>"User has been deleted"]);
        $this->clear();
        $this->emit('refresh');
        return FALSE;
    }

    public function clear(){
        $this->reset([
            'name',
            'role',
            'email',
            'password',
            'wa',
            'selectedItem',
            'force',
            'selectedItems',
        ]);
    }

  
}
