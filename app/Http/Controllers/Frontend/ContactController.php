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

class ContactController extends Controller
{
    public function index()
    {
        $data['title'] = 'Rama Tranz - Kontak Kami | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Kontak Kami';
        $data['url'] = URL::current();
        $metades = "Percayakan perjalananmu hanya dengan " . env('APP_NAME', 'Default Name') . ". Terdapat fasilitas yang lengkap dengan harga yang murah.";

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;  

        $contacts = Kontak::where('id', 1)->first();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $tentang = Page::get()->first();
        $tagManager = TagManager ::first();
        $seoPage = Page::where('slug', '=', 'kontak')->first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        return view('frontend.kontak.index', compact('data', 'dataSeo','metades', 'contacts', 'menuLayanan', 'tentang','tagManager','seoPage','gtagManager','analytics'));
    }
}
