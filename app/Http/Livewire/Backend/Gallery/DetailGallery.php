<?php

namespace App\Http\Livewire\Backend\Gallery;

use App\Models\Gallery;
use Livewire\Component;

class DetailGallery extends Component
{
    public $detailGallery;
    public function mount($id)
    {
        $this->detailGallery = Gallery::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.gallery.detail-gallery');
    }
}
