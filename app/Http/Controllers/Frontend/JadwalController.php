<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Analytics;
use App\Models\GtagManager;
use App\Models\Jadwal;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\Page;
use App\Models\Seo;
use App\Models\TagManager;
use Illuminate\Support\Facades\URL;

class JadwalController extends Controller
{
    public function index()
    {
        $data['title'] = company_config('name');
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Home Screen';
        $data['url'] = URL::current();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $dataJadwal = Jadwal::get();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $tagManager = TagManager::first();
        $seoPage = Page::where('slug', '=', 'jadwal')->first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        $metades = env('APP_NAME', 'Default Name') . " memiliki jadwal yang  fleksibel dan keberangkatan yang tepat waktu.";
        $rute1 = Layanan::latest()->get();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;     

        // Kelompokkan data berdasarkan kolom "asal" setelah mendapatkan hasil
        $rute = $rute1->sortBy(function ($item) {
            return $item->asal;
        });
        return view('frontend.jadwal.index', compact('metades', 'data', 'dataSeo','dataJadwal','contacts','tentang','menuLayanan','tagManager','seoPage','gtagManager','analytics','rute', 'rute1'));
    }

}