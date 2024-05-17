<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Analytics;
use App\Models\GtagManager;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Page;
use App\Models\Seo;
use App\Models\TagManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AboutController extends Controller
{
    public function index()
    {
        $data['title'] = 'Rama Tranz - Tentang Kami | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Tentang Kami';
        $data['url'] = URL::current();
        $metades = "Perjalanan nyaman dan mudah hanya dengan " . env('APP_NAME', 'Default Name') . " Dengan harga murah sudah bisa pulang kampung";

        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $tentang = Page::get()->first();
        $contacts = Kontak::where('id', 1)->first();
        $tagManager = TagManager::first();
        $seoPage = Page::where('slug', '=', 'tentang-kami')->first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;  

        return view('frontend.abouts.index', compact('data', 'dataSeo', 'tentang', 'metades', 'contacts', 'menuLayanan','tagManager','seoPage','gtagManager','analytics'));
    }
}
