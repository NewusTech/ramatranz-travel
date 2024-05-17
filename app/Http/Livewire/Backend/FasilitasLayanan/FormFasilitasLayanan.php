<?php

namespace App\Http\Livewire\Backend\FasilitasLayanan;

use App\Models\FasilitasLayanan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormFasilitasLayanan extends Component
{
    use WithFileUploads;
    public FasilitasLayanan $fasilitasLayanan;
    public $gambar;


    protected $rules = [
        'fasilitasLayanan.nama_fasilitas'        => 'required',
        'fasilitasLayanan.description'           => 'required',
    ];

    public function mount($id = null)
    {

        $this->fasilitasLayanan = new FasilitasLayanan();
        if ($id) {
            $this->fasilitasLayanan = FasilitasLayanan::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.fasilitas-layanan.form-fasilitas-layanan');
    }

    public function save()
    {
        $this->validate();
        if (!$this->fasilitasLayanan->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/fasilitas', 's3');
            $this->fasilitasLayanan->image = $gambarPath;       
        }

        try {
            $this->fasilitasLayanan->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Fasilitas Layanan berhasil ditambahkan"]);

            redirect(route('data-fasilitas-layanan'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Fasilitas Layanan tidak berhasil ditambahkan"]);
        }
    }
}
