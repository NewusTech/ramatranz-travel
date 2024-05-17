<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Blog;
use App\Models\JenisLayanan;
use App\Models\Layanan;
use Livewire\Component;

class DashboardSuperadmin extends Component
{

    public $layanan, $jenisLayanan, $blogs;

    public function mount()
    {
        $this->layanan = Layanan::get();
        $this->jenisLayanan = JenisLayanan::get();
        $this->blogs = Blog::get();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-superadmin');
    }
}
