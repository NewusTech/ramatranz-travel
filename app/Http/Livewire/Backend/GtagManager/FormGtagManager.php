<?php

namespace App\Http\Livewire\Backend\GtagManager;

use App\Models\GtagManager;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class FormGtagManager extends Component
{
    public $gambar;
    public GtagManager $gtagmanager;


    protected $rules = [
        'gtagmanager.source'        => 'required',
        'gtagmanager.code'         => 'required',
    ];
    public function mount($id = null)
    {

        $this->gtagmanager = new GtagManager();

        if ($id) {
            $this->gtagmanager = GtagManager::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.backend.gtagmanager.form-gtagmanager');
    }

    public function updatedBlogs($value, $key)
    {
        if ($key == 'title') {
            $this->gtagmanager->id = Str::slug($value);
            $this->validateOnly('gtagmanager.id');
        }
    }


    public function save()
    {
        $this->validate();
        try {
            $this->gtagmanager->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Gtag Manager berhasil ditambahkan"]);

            redirect(route('data-gtagmanager'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Gtag Manager tidak berhasil ditambahkan"]);
        }
    }
}
