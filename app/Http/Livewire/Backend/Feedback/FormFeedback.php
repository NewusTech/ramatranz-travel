<?php

namespace App\Http\Livewire\Backend\Feedback;

use App\Models\Feedback;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormFeedback extends Component
{
    use WithFileUploads;
    public $gambar;
    public Feedback $feedback;


    protected $rules = [
        'feedback.title'                    => 'required',
        'feedback.desc'                     => 'required',
        'feedback.no_hp'                     => 'required',
        'feedback.rating'                     => 'required',

    ];

    public function mount($id = null)
    {

        $this->feedback = new Feedback();

        if ($id) {
            $this->feedback = Feedback::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.feedback.form-feedback');
    }

    public function save()
    {
        $this->validate();
        if (!$this->feedback->image) {
            $this->validate([
                'gambar'    => 'image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/feedback', 's3');
            $this->feedback->image = $gambarPath;        
        }
        try {
            $this->feedback->save();

            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Feedback berhasil ditambahkan"]);

            redirect(route('data-feedback'));
        } catch (\Throwable $th) {
            throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Feedback tidak berhasil ditambahkan"]);
        }
    }
}
