<?php

namespace App\Http\Livewire\Backend\Feedback;

use App\Models\Feedback as ModelsFeedback;
use Livewire\Component;

class Feedback extends Component
{
    public $selectedItem, $force = false;
    protected $listeners = ['refresh' => '$refresh', 'confirm', 'delete', 'restore'];

    public function render()
    {
        return view('livewire.backend.feedback.feedback');
    }

    public function restore($id)
    {
        ModelsFeedback::withTrashed()->find($id)->restore();
        $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Post has been restored"]);
        $this->emit('refresh');
    }

    public function deleteSelected()
    {

        if ($this->force === false) {
            ModelsFeedback::whereIn('id', $this->selectedItems)->delete();
        } else {
            ModelsFeedback::onlyTrashed()->whereIn('id', $this->selectedItems)->forceDelete();
        }
        $this->clear();
        $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Users has been deleted"]);
        $this->emit('refresh');
    }


    public function confirm($item = null, $multiple = false, $permanently = false)
    {
        $this->force = $permanently;
        $this->selectedItem = $item;

        if ($item === null && $multiple === true) {
            //multiple softDelete
            $this->dispatchBrowserEvent('confirm-delete', ['mode' => 'multiple', 'item' => null, 'for' => 'trash']);
        }
        if ($item === null && $multiple === true && $permanently === true) {
            //multiple force delete
            $this->dispatchBrowserEvent('confirm-delete', ['mode' => 'multiple', 'item' => null, 'for' => 'force']);
        }

        if ($item !== null && $multiple === false && $permanently === true) {
            // single force delete
            $this->dispatchBrowserEvent('confirm-delete', ['mode' => 'single', 'item' => $item, 'for' => 'force']);
        }

        if ($item !== null && $multiple === false && $permanently === false) {
            $this->dispatchBrowserEvent('confirm-delete', ['mode' => 'single', 'item' => $item, 'for' => 'trash']);
        }
    }

    public function delete()
    {
        if ($this->force === false) {
            ModelsFeedback::where('id', $this->selectedItem)->delete();
        } else {
            ModelsFeedback::onlyTrashed()->find($this->selectedItem)->forceDelete();
        }
        $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Feedback has been deleted"]);
        $this->clear();
        $this->emitSelf('refresh');
        return FALSE;
    }

    public function clear()
    {
        $this->reset();
    }
}
