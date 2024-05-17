<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Carousel;
use App\Models\LembagaPenyalur;
use App\Models\ProdukKur;
use Livewire\Component;

class LandingPage extends Component
{
    public $penyalur;
    public $produk = [];
    public $carousel = [];
    public $kode;
    public $item;
    public $blog;

    public function mount(){
        $this->blogs = Blog::all();
    }
    public function render()
    {
        return view('livewire.frontend.landing-page')->layout('layouts.frontend.frontend');
    }

    public function cari(){
        redirect(route('cek-status',$this->kode));
    }

    public function show($id){
        $this->item = ProdukKur::findOrFail($id);
    }
}
