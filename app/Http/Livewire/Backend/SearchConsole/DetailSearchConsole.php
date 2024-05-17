<?php

namespace App\Http\Livewire\Backend\SearchConsole;

use App\Models\SearchConsole;
use Livewire\Component;

class DetailSearchConsole extends Component
{
    public $searchConsoleDetail;
    public function mount($id)
    {
        $this->searchConsoleDetail = SearchConsole::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.search-console.detail-search-console');
    }
}
