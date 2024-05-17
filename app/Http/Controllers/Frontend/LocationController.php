<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Page;
use App\Models\ParentArea;
use App\Models\TagManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LocationController extends Controller
{

    public function locationOutlet(ParentArea $key)
    {
        $data['title'] = 'RamaTrans - Lokasi Rama Trans Travel | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Lokasi Rama Trans Travel';
        $data['url'] = URL::current();
        $metades =  ParentArea::where('slug', $key->slug)->value('excerpt');
        $parentOutlet = ParentArea::select(['id', 'nama_provinsi', 'slug'])->where('slug', $key->slug)->get();
        $outlet_all =  $key->areas()->latest()->paginate(6);
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $tagManager = TagManager::first();
        return view('frontend.location.outletByProvinsi', compact('data', 'metades', 'tentang', 'parentOutlet', 'outlet_all', 'menuLayanan', 'contacts','tagManager'));
    }
}
