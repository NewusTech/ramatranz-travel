<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Page as ModelsPage;
use Livewire\Component;

class Page extends Component
{
    public $content;
    public function render()
    {
        $this->content = ModelsPage::where('slug','tentang')->first();
        return view('livewire.frontend.page')->layout('layouts.frontend.frontend');
    }
}
