<?php

namespace App\Http\Livewire\Backend\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormBlog extends Component
{
    use WithFileUploads;
    public $gambar;
    public Blog $blogs;
    public $content;

    protected $rules = [
        'blogs.title'        => 'required',
        'blogs.slug'         => 'required',
        'blogs.content'      => 'required',
        'blogs.excerpt'      => 'required',
        // 'blog.image'        => 'required',
        'blogs.status'       => 'required',
        'blogs.published_at' => 'required',
        'blogs.keyword' => '',
    ];
    public function mount($id = null)
    {

        $this->blogs = new Blog();
        $this->blogs->status = 'draft';
        $this->blogs->published_at = now()->format('Y-m-d');

        if ($id) {
            $this->blogs = Blog::findOrFail($id);
            $this->blogs->published_at = \Carbon\Carbon::parse($this->blogs->published_at)->format('Y-m-d');
        }
    }
    public function render()
    {
        return view('livewire.backend.blog.form-blog');
    }

    public function updatedBlogs($value, $key)
    {
        if ($key == 'title') {
            $this->blogs->slug = Str::slug($value);
            $this->validateOnly('blogs.slug');
        }
    }


    public function save()
    {
        $this->validate();
        if (!$this->blogs->image) {
            $this->validate([
                'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:250',
            ]);
        }
        $this->validate([
            'blogs.slug'      => 'required|unique:blogs,slug,' . $this->blogs->id,
        ]);

        $this->blogs->user_id = auth()->user()->id;

        if ($this->gambar) {            
            $gambarPath = $this->gambar->store('ramatrans/post', 's3');
            $this->blogs->image = $gambarPath;      
        }
        try {
            $this->blogs->save();
      
            $this->dispatchBrowserEvent('success-izi', ['ntitle' => 'Success', 'nmessage' => "Blog berhasil ditambahkan"]);

            redirect(route('data-blog'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th);
            $this->dispatchBrowserEvent('error-izi', ['ntitle' => 'Error', 'nmessage' => "Blog tidak berhasil ditambahkan"]);
        }
    }
}
