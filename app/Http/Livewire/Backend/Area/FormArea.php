<?php

namespace App\Http\Livewire\Backend\Area;

use App\Models\Area;
use App\Models\ParentArea;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormArea extends Component
{
    use WithFileUploads;
    public $nm_provinsi;
    public Area $area;


    protected $rules = [
        'area.parent_areas_id'  => 'required',
        'area.kota_kab'         => 'required',
        'area.alamat'           => 'required',
        'area.lat'              => 'required',
        'area.lng'              => 'required',
        'area.isHQ'             => '',
        'area.nama_phone'       => 'required',
        'area.phone_1'          => 'required',
        'area.phone_2'          => '',
        'area.wa'               => '',
    ];

    public function mount($id = null)
    {

        $this->area = new Area();
        $this->area->isHQ = 1;

        if ($id) {
            $this->area = Area::findOrFail($id);
        }

        $this->nm_provinsi = ParentArea::get();
    }

    public function render()
    {
        return view('livewire.backend.area.form-area');
    }

    public function save()
    {
        $this->validate();

        try {
            $this->area->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Data Area berhasil ditambahkan"]);

            redirect(route('data-area'));
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Data Area tidak berhasil ditambahkan"]);
        }
    }
}
