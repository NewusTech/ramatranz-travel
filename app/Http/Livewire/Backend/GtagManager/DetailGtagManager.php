<?php

namespace App\Http\Livewire\Backend\GtagManager;

use App\Models\GtagManager;
use Livewire\Component;

class DetailGtagManager extends Component
{
    public $gtagmanagerDetail;
    public function mount($id)
    {
        $this->gtagmanagerDetail = GtagManager::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.gtagmanager.detail-gtagmanager');
    }
}
