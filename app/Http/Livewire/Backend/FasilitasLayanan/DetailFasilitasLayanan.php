<?php

namespace App\Http\Livewire\Backend\FasilitasLayanan;

use App\Models\FasilitasLayanan;
use Livewire\Component;

class DetailFasilitasLayanan extends Component
{
    public $detailFasilitas;
    public function mount($id)
    {
        $this->detailFasilitas = FasilitasLayanan::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.fasilitas-layanan.detail-fasilitas-layanan');
    }
}
