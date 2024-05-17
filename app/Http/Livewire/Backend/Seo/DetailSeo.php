<?php

namespace App\Http\Livewire\Backend\Seo;

use App\Models\Seo;
use Livewire\Component;

class DetailSeo extends Component
{
    public $seoDetail;
    public function mount($id)
    {
        $this->seoDetail = Seo::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.seo.detail-seo');
    }
}
