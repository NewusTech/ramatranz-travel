<?php

namespace App\Http\Livewire\Backend\Area;

use App\Models\Area;
use App\Models\ParentArea;
use Livewire\Component;

class DetailArea extends Component
{
    public $areaDetail;
    public function mount($id)
    {
        $this->areaDetail = Area::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.area.detail-area');
    }
}
