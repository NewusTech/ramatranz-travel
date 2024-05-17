<?php

namespace App\Http\Livewire\Backend\Youtube;

use App\Models\LinkYoutube;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class FormYoutube extends Component
{
    use WithFileUploads;
    public LinkYoutube $link;

    protected $rules = [
        'link.link_youtube'              => 'required',
    ];

    public function mount($id = null)
    {

        $this->link = new LinkYoutube();
        if ($id) {
            $this->link = LinkYoutube::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.backend.youtube.form-youtube');
    }

    public function save()
    {
        $this->validate();

        try {
            $this->link->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Link Youtube berhasil ditambahkan"]);

            redirect(route('data-youtube'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Link Youtube tidak berhasil ditambahkan"]);
        }
    }
}
