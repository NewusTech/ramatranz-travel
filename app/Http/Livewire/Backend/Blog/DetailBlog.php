<?php

namespace App\Http\Livewire\Backend\Blog;

use App\Models\Blog;
use Livewire\Component;

class DetailBlog extends Component
{
    public $blogDetail;
    public function mount($slug)
    {
        $this->blogDetail = Blog::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.backend.blog.detail-blog');
    }
}
