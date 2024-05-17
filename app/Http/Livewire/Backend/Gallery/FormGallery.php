<?php

namespace App\Http\Livewire\Backend\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormGallery extends Component
{
    use WithFileUploads;
    public $gambar;
    public Gallery $photo;


    protected $rules = [
        'photo.title'                    => 'required',
        'photo.category'                 => '',
    ];

    public function mount($id = null)
    {

        $this->photo = new Gallery();
        if ($id) {
            $this->photo = Gallery::findOrFail($id);
        }
    }


    public function render()
    {
        return view('livewire.backend.gallery.form-gallery');
    }

    public function save()
    {
        $this->validate();
        if (!$this->photo->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',            
            ]);
        }

        if ($this->gambar) {        
            $gambarPath = $this->gambar->store('ramatrans/gallery', 's3');
            $this->photo->image = $gambarPath;            
        }
        try {
            $this->photo->save();

            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Gallery berhasil ditambahkan"]);

            redirect(route('data-gallery'));
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Gallery tidak berhasil ditambahkan"]);
        }
    }
}
