<?php

namespace App\Http\Livewire\Backend\JenisLayanan;

use App\Models\JenisLayanan;
use Livewire\Component;

class DetailJenisLayanan extends Component
{
    public $jenisLayanan;
    public function mount($slug)
    {
        $this->jenisLayanan = JenisLayanan::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.jenis-layanan.detail-jenis-layanan');
    }
}
