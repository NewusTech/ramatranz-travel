<?php

namespace App\Http\Livewire\Backend\ParentArea;

use App\Models\ParentArea;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FormParentArea extends Component
{
    use WithFileUploads;
    public $gambar;
    public ParentArea $parentArea;


    protected $rules = [
        'parentArea.nama_provinsi'   => 'required',
        'parentArea.slug'            => 'required',
        'parentArea.excerpt'      => 'required',
    ];

    public function mount($id = null)
    {

        $this->parentArea = new ParentArea();
        if ($id) {
            $this->parentArea = ParentArea::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.parent-area.form-parent-area');
    }

    public function updatedParentArea($value, $key)
    {
        if ($key == 'nama_provinsi') {
            $this->parentArea->slug = Str::slug($value);
            $this->validateOnly('parentArea.slug');
        }
    }

    public function save()
    {
        $this->validate();
        $this->validate([
            'parentArea.slug'      => 'required|unique:parent_areas,slug,' . $this->parentArea->id,
        ]);

        $this->validate();
        if (!$this->parentArea->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/area', 's3');
            $this->parentArea->image = $gambarPath;        
        }

        try {
            $this->parentArea->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Data Provinsi berhasil ditambahkan"]);

            redirect(route('data-parent-area'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Data Provinsi tidak berhasil ditambahkan"]);
        }
    }
}
