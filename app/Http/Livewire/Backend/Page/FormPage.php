<?php

namespace App\Http\Livewire\Backend\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class FormPage extends Component
{
    use WithFileUploads;
    public $gambar;
    public Page $pages;

    protected $rules = [
        'pages.title'              => 'required',
        'pages.slug'               => 'required',
        'pages.meta_desc'          => '',
        'pages.seo_title'          => '',
        // 'pages.media'              => '',
        'pages.short_description'  => 'required',
        'pages.content'            => 'required',
    ];

    public function mount($id = null)
    {

        $this->pages = new Page();
        if ($id) {
            $this->pages = Page::findOrFail($id);
        }
    }

    public function render()
    {
        return view('livewire.backend.page.form-page');
    }

    public function updatedPages($value, $key)
    {
        if ($key == 'title') {
            $this->pages->slug = Str::slug($value);
            $this->validateOnly('pages.slug');
        }
    }

    public function save()
    {
        $this->validate();
        if (!$this->pages->media) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }
        $this->validate([
            'pages.slug'      => 'required|unique:pages,slug,' . $this->pages->id,
        ]);

        $this->pages->author_id = auth()->user()->id;

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/pages', 's3');
            $this->pages->media = $gambarPath;       
        }

        try {
            $this->pages->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Pages berhasil ditambahkan"]);

            redirect(route('data-page'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Pages tidak berhasil ditambahkan"]);
        }
    }
}
