<?php

namespace App\Http\Livewire\Frontend\Blog;

use App\Models\Blog;
use Livewire\Component;

class DetailBlog extends Component
{
    public $blog;
    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.frontend.blog.detail-blog')->layout('layouts.frontend.frontend');
    }
}
