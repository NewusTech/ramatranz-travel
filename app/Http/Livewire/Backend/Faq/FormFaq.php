<?php

namespace App\Http\Livewire\Backend\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;


class FormFaq extends Component
{

    use WithFileUploads;
    public Faq $faq;

    protected $rules = [
        'faq.question'        => 'required',
        'faq.answer'          => 'required',
    ];

    public function render()
    {
        return view('livewire.backend.faq.form-faq');
    }

    public function mount($id = null)
    {

        $this->faq = new Faq();
        if ($id) {
            $this->faq = Faq::findOrFail($id);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            $this->faq->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Data Faq berhasil ditambahkan"]);

            redirect(route('data-faq'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Data Faq tidak berhasil ditambahkan"]);
        }
    }
}
