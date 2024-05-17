<?php

namespace App\Http\Livewire\Backend\Seo;

use App\Models\Seo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class FormSeo extends Component
{
    public Seo $seo_tools;
    public $gambar;
    use WithFileUploads;

    protected $rules = [
        'seo_tools.site_title'        => '',
        'seo_tools.home_title'        => '',
        'seo_tools.site_description'       => '',
        'seo_tools.keywords'        => '',
    ];

    public function mount($id = null)
    {

        $this->seo_tools = new Seo();

        if ($id) {
            $this->seo_tools = Seo::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.backend.seo.form-seo');
    }

    // public function updatedBlogs($value, $key)
    // {
    //     if ($key == 'title') {
    //         $this->tags->id = Str::slug($value);
    //         $this->validateOnly('tags.id');
    //     }
    // }


    public function save()
    {
        $this->validate();
        if (!$this->seo_tools->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/seo', 's3');
            $this->seo_tools->image = $gambarPath;
        }
        try {
            $this->seo_tools->save();
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Seo berhasil ditambahkan"]);

            redirect(route('data-seo'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Seo tidak berhasil ditambahkan"]);
        }
    }
}
