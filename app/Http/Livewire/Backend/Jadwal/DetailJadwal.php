<?php

namespace App\Http\Livewire\Backend\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class DetailJadwal extends Component
{
    public $jadwal;
    public function mount($id)
    {
        $this->jadwal = Jadwal::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.jadwal.detail-jadwal');
    }
}
