<?php

namespace App\Http\Livewire\Backend\Carousel;

use App\Models\Carousel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormCarousel extends Component
{
    use WithFileUploads;
    public $gambar;
    public Carousel $carousel;


    protected $rules = [
        'carousel.title_top'                    => '',
        'carousel.title'                        => '',
        'carousel.title_bot'                    => '',

    ];

    public function mount($id = null)
    {

        $this->carousel = new Carousel();

        if ($id) {
            $this->carousel = Carousel::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.carousel.form-carousel');
    }

    public function save()
    {
        $this->validate();
        if (!$this->carousel->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }

        if ($this->gambar) {
            $gambarPath = $this->gambar->store('ramatrans/carousel', 's3');
            $this->carousel->image = $gambarPath;
        }
        try {
            $this->carousel->save();

            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Gambar Slider berhasil ditambahkan"]);

            redirect(route('data-carousel'));
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Gambar Slider tidak berhasil ditambahkan"]);
        }
    }
}
