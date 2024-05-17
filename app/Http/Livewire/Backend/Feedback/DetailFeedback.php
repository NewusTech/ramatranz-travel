<?php

namespace App\Http\Livewire\Backend\Feedback;

use App\Models\Feedback;
use Livewire\Component;

class DetailFeedback extends Component
{
    public $detailFeedback;
    public function mount($id)
    {
        $this->detailFeedback = Feedback::where('id', $id)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.backend.feedback.detail-feedback');
    }
}
