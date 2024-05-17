<?php

namespace App\Http\Livewire\Backend\Kontak;

use App\Models\Kontak;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormKontak extends Component
{
    use WithFileUploads;
    public Kontak $kontak;


    protected $rules = [
        'kontak.alamat'           => 'required',
        'kontak.lat'              => 'required',
        'kontak.lng'              => 'required',
        'kontak.email'            => 'required',
        'kontak.phone_tr_1'       => 'required',
        'kontak.phone_tr_2'       => '',
        'kontak.phone_cr_1'       => 'required',
        'kontak.phone_cr_2'       => '',
        'kontak.wa_1'               => '',
        'kontak.wa_2'               => '',
    ];

    public function mount($id = null)
    {

        $this->kontak = new Kontak();

        if ($id) {
            $this->kontak = Kontak::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.kontak.form-kontak');
    }

    public function save()
    {
        $this->validate();

        try {
            $this->kontak->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Data Kontak berhasil ditambahkan"]);

            redirect(route('data-kontak'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Data Kontak tidak berhasil ditambahkan"]);
        }
    }
}
