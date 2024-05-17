<?php

namespace App\Http\Livewire\Backend\Layanan;

use App\Models\Layanan;
use Livewire\Component;

class DetailLayanan extends Component
{
    public $layananDetail;
    public function mount($slug)
    {
        $this->layananDetail = Layanan::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.layanan.detail-layanan');
    }
}
