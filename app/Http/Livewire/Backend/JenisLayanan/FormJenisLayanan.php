<?php

namespace App\Http\Livewire\Backend\JenisLayanan;

use App\Models\JenisLayanan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class FormJenisLayanan extends Component
{
    use WithFileUploads;
    public JenisLayanan $jenisLayanan;
    public $gambar;



    protected $rules = [
        'jenisLayanan.title'        => 'required',
        'jenisLayanan.excerpt'      => 'required',
        'jenisLayanan.slug'         => 'required',
        'jenisLayanan.content'         => '',
    ];

    public function mount($id = null)
    {

        $this->jenisLayanan = new JenisLayanan();
        if ($id) {
            $this->jenisLayanan = JenisLayanan::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.jenis-layanan.form-jenis-layanan');
    }

    public function updatedJenisLayanan($value, $key)
    {
        if ($key == 'title') {
            $this->jenisLayanan->slug = Str::slug($value);
            $this->validateOnly('jenisLayanan.slug');
        }
    }

    public function save()
    {
        $this->validate();
        $this->validate([
            'jenisLayanan.slug' => 'required|unique:jenis_layanans,slug,' . $this->jenisLayanan->id,
            'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
        ]);

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/jenis-layanan', 's3');
            $this->jenisLayanan->media = $gambarPath;      
        }

        try {
            // dd($this->jenisLayanan);
            $this->jenisLayanan->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Jenis Layanan berhasil ditambahkan"]);

            redirect(route('data-jenis-layanan'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Jenis Layanan tidak berhasil ditambahkan"]);
        }
    }
}
