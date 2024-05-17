<?php

namespace App\Http\Livewire\Backend\Jadwal;

use App\Models\Jadwal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class FormJadwal extends Component
{
    use WithFileUploads;
    public Jadwal $jadwal;



    protected $rules = [
        'jadwal.asal'        => '',
        'jadwal.tujuan'         => '',
        'jadwal.mulai_jemput'         => '',
        'jadwal.harga'         => '',
    ];

    public function mount($id = null)
    {

        $this->jadwal = new Jadwal();
        if ($id) {
            $this->jadwal = Jadwal::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.jadwal.form-jadwal');
    }

    public function save()
    {
        $this->validate();
        try {
            $this->jadwal->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Jadwal berhasil ditambahkan"]);

            redirect(route('data-jadwal'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Jadwal tidak berhasil ditambahkan"]);
        }
    }
}
