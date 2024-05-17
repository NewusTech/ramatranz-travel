<?php

namespace App\Http\Livewire\Backend\Unggulan;

use App\Models\Unggulan;
use Livewire\Component;

class DetailUnggulan extends Component
{
    public $detailUnggulan;
    public function mount($id)
    {
        $this->detailUnggulan = Unggulan::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.unggulan.detail-unggulan');
    }
}
