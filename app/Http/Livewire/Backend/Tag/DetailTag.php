<?php

namespace App\Http\Livewire\Backend\Tag;

use App\Models\TagManager;
use Livewire\Component;

class DetailTag extends Component
{
    public $tagDetail;
    public function mount($id)
    {
        $this->tagDetail = TagManager::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.tag.detail-tag');
    }
}
