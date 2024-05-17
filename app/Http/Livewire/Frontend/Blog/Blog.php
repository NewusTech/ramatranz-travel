<?php

namespace App\Http\Livewire\Frontend\Blog;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog.blog')->layout('layouts.frontend.frontend');
    }
}
