<?php

namespace App\Http\Livewire\Backend\Page;

use App\Models\Page;
use Livewire\Component;

class DetailPage extends Component
{
    public $pageDetail;
    public function mount($slug)
    {
        $this->pageDetail = Page::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.page.detail-page');
    }
}
