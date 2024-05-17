<?php

namespace App\Http\Livewire\Backend\Kontak;

use App\Models\Kontak;
use Livewire\Component;

class DetailKontak extends Component
{
    public $detailKontak;
    public function mount($id)
    {
        $this->detailKontak = Kontak::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.kontak.detail-kontak');
    }
}
