<?php

namespace App\Http\Livewire\Backend\Landing;

use App\Models\Landing;
use Livewire\Component;

class DetailPage extends Component
{
    public $pageDetail;
    public function mount($id)
    {
        $this->pageDetail = Landing::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.landing.detail-landing');
    }
}
