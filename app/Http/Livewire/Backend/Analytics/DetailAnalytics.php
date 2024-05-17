<?php

namespace App\Http\Livewire\Backend\Analytics;

use App\Models\Analytics;
use Livewire\Component;

class DetailAnalytics extends Component
{
    public $analyticsDetail;
    public function mount($id)
    {
        $this->analyticsDetail = Analytics::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.analytics.detail-analytics');
    }
}
