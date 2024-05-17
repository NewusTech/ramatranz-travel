<?php

namespace App\Http\Livewire\Backend\Carousel;

use App\Models\Carousel;
use Livewire\Component;

class DetailCarousel extends Component
{
    public $detailCarousel;
    public function mount($id)
    {
        $this->detailCarousel = Carousel::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.carousel.detail-carousel');
    }
}
