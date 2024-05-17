<?php

namespace App\Http\Livewire\Backend\Unggulan;

use App\Models\Unggulan;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormUnggulan extends Component
{
    use WithFileUploads;
    public Unggulan $unggulan;


    protected $rules = [
        'unggulan.icon'                     => 'required',
        'unggulan.title'                    => 'required',
        'unggulan.desc'                     => 'required',

    ];

    public function mount($id = null)
    {

        $this->unggulan = new Unggulan();

        if ($id) {
            $this->unggulan = Unggulan::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.unggulan.form-unggulan');
    }

    public function save()
    {
        $this->validate();

        try {
            $this->unggulan->save();

            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Unggulan berhasil ditambahkan"]);

            redirect(route('data-unggulan'));
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Unggulan tidak berhasil ditambahkan"]);
        }
    }
}
