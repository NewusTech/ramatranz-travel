<?php

namespace App\Http\Livewire\Backend\Layanan;

use App\Models\FasilitasLayanan;
use App\Models\FasilitasTag;
use App\Models\JenisLayanan;
use App\Models\Layanan;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class FormLayanan extends Component
{
    use WithFileUploads;
    public $gambar, $kategori, $kategoriLayanan, $tags;
    public Layanan $layanan;


    protected $rules = [
        'layanan.jenis_layanan_id'         => 'required',
        'layanan.title'                    => 'required',
        'layanan.slug'                     => 'required',
        'layanan.intro'                    => 'required',
        'layanan.content'                  => 'required',
        // 'layanan.image'                    => 'required',
        'layanan.price'                    => 'required',
        'layanan.asal'                     => 'required',
        'layanan.tujuan'                   => 'required',
        'layanan.wa'                       => 'required',
        'layanan.isNegotiatable'           => 'required',
        'layanan.jadwal_berangkat'         => '',
        'layanan.rute_berangkat'           => '',
        'layanan.jenis_carter'             => '',
        'layanan.jam_pagi'             => '',
        'layanan.jam_siang'             => '',
        'layanan.jam_sore'             => '',
        'layanan.jam_malam'             => '',
    ];

    public function mount($id = null)
    {
        $this->layanan = new Layanan();
        $this->layanan->isNegotiatable = 1;

        if ($id) {
            $this->layanan = Layanan::with('fasilitas')->findOrFail($id);
        }
       
        $this->kategori = JenisLayanan::get();
        $this->kategoriLayanan = FasilitasLayanan::get();
    }

    public function render()
    {
        return view('livewire.backend.layanan.form-layanan');
    }

    public function updatedLayanan($value, $key)
    {
        if ($key == 'title') {
            $this->layanan->slug = Str::slug($value);
            $this->validateOnly('layanan.slug');
        }
    }

    public function save()
    {
        $this->validate();
        if (!$this->layanan->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }

        $this->validate([
            'layanan.slug'      => 'required|unique:layanans,slug,' . $this->layanan->id,
        ]);

        $this->layanan->user_id = auth()->user()->id;


        if ($this->gambar) {
            $gambarPath = $this->gambar->store('ramatrans/layanan', 's3');
            $this->layanan->image = $gambarPath;            
        }

        try {
            $this->layanan->save();
            // flush data tags
            if($this->tags){
                FasilitasTag::where('layanans_id', $this->layanan->id)->delete();
                // Insert to table pivot (fasilitas_tag)
                $this->layanan->fasilitas()->attach($this->tags);
            }
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Data Layanan berhasil ditambahkan"]);

            redirect(route('data-layanan'));
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Data Layanan tidak berhasil ditambahkan"]);
        }
    }
}
