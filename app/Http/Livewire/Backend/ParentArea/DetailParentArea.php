<?php

namespace App\Http\Livewire\Backend\ParentArea;

use App\Models\ParentArea;
use Livewire\Component;

class DetailParentArea extends Component
{
    public $parentArea;
    public function mount($slug)
    {
        $this->parentArea = ParentArea::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.parent-area.detail-parent-area');
    }
}
