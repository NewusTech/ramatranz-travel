<?php

namespace App\Http\Livewire\Backend\Tag;

use App\Models\TagManager;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class FormTag extends Component
{
    public $gambar;
    public TagManager $tags;


    protected $rules = [
        'tags.source'        => 'required',
        'tags.codeTag'         => 'required',
    ];
    public function mount($id = null)
    {

        $this->tags = new TagManager();

        if ($id) {
            $this->tags = TagManager::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.backend.tag.form-tag');
    }

    public function updatedBlogs($value, $key)
    {
        if ($key == 'title') {
            $this->tags->id = Str::slug($value);
            $this->validateOnly('tags.id');
        }
    }


    public function save()
    {
        $this->validate();
        try {
            $this->tags->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Tag berhasil ditambahkan"]);

            redirect(route('data-tag'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Tag tidak berhasil ditambahkan"]);
        }
    }
}
