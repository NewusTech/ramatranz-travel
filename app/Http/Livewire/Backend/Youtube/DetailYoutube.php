<?php

namespace App\Http\Livewire\Backend\Youtube;

use App\Models\LinkYoutube;
use Livewire\Component;

class DetailYoutube extends Component
{
    public $detailYoutube;
    public function mount($id)
    {
        $this->detailYoutube = LinkYoutube::where('id', $id)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.backend.youtube.detail-youtube');
    }
}
