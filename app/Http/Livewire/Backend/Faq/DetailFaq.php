<?php

namespace App\Http\Livewire\Backend\Faq;

use App\Models\Faq;
use Livewire\Component;

class DetailFaq extends Component
{
    public $detailFaq;
    public function mount($id)
    {
        $this->detailFaq = Faq::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.faq.detail-faq');
    }
}
