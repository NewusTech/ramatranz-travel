<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Analytics;
use App\Models\FasilitasLayanan;
use App\Models\GtagManager;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\Page;
use App\Models\Seo;
use App\Models\TagManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class LayananController extends Controller
{
    public function layananAll(Request $request)
    {
        $data['title'] = 'Rama Tranz - Layanan Transportasi | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Layanan Carter';
        $data['url'] = URL::current();

        $asal = $request->input('asal');
        $tujuan = $request->input('tujuan');
        $jam = $request->input('jam');

        $layananQuery = Layanan::query();

        $layananQuery->where('asal', 'LIKE', "%$asal%")
        ->where('tujuan', 'LIKE', "%$tujuan%");
    
    // Jika $jam diisi, tambahkan kondisi untuk jam
        if ($jam) {
            $layananQuery->where(function ($query) use ($jam) {
                $query->where('jam_pagi', 'LIKE', "%$jam%")
                    ->orWhere('jam_siang', 'LIKE', "%$jam%")
                    ->orWhere('jam_sore', 'LIKE', "%$jam%")
                    ->orWhere('jam_malam', 'LIKE', "%$jam%");
            });
        }
    
        // Menjalankan kueri dan mengambil hasilnya
        $metades = env('APP_NAME', 'Default Name') . " menyediakan kenyamanan dan keamanan untuk perjalanan anda. Jangan ragu percayakan perjalananmu dengan kami";
        $layanan = $layananQuery->latest()->paginate(12)->withQueryString();        
        $asals = DB::table('layanans')->select('asal')->distinct()->get()->pluck('asal');
        $tujuans = DB::table('layanans')->select('tujuan')->distinct()->get()->pluck('tujuan');
        $jenis_l = DB::table('layanans')->select('jenis_layanan_id')->distinct()->get()->pluck('jenis_layanan_id');
        $jenisLayanan = JenisLayanan::select(['id', 'title', 'slug'])->get();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;  

        $tagManager = TagManager::first();
        $seoPage = Page::where('slug', '=', 'jadwal')->first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        return view('frontend.layanan.layananAll', compact('data', 'dataSeo', 'metades', 'layanan', 'jenisLayanan', 'menuLayanan', 'asals', 'tujuans', 'jenis_l', 'contacts', 'tentang','tagManager','seoPage','gtagManager','analytics', 'asal', 'tujuan', 'jam'));
    }

    public function liveSearch(Request $request)
    {    
        $query = $request->input('query');
        $query2 = $request->input('query2');
        $query3 = $request->input('query3');
        $title2 = $request->input('page');

        $layanan = Layanan::where('asal', 'LIKE', "%$query%")
            ->where('tujuan', 'LIKE', "%$query2%")
            ->where(function ($queryBuilder) use ($query3) {
                $queryBuilder->orWhere('jam_pagi', 'LIKE', "%$query3%")
                    ->orWhere('jam_siang', 'LIKE', "%$query3%")
                    ->orWhere('jam_sore', 'LIKE', "%$query3%")
                    ->orWhere('jam_malam', 'LIKE', "%$query3%");
            })->paginate(12);

        return view('frontend.layanan.layananAll-list', compact('layanan', 'title2'));
    }

    public function layananByCategory(JenisLayanan $key)
    {
        $data['title'] = 'Rama Tranz - Layanan Transportasi | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Layanan Carter';
        $data['url'] = URL::current();

        $metades =  JenisLayanan::where('slug', $key->slug)->value('excerpt');
        $jenisLayanan = JenisLayanan::select(['id', 'title', 'slug','media','content', 'excerpt'])->where('slug', $key->slug)->first();
        $jenisLayanan_all =  $key->layanan()->latest()->paginate(6);
        $asals = DB::table('layanans')->select('asal')->distinct()->get()->pluck('asal');
        $tujuans = DB::table('layanans')->select('tujuan')->distinct()->get()->pluck('tujuan');
        $jenis_l = DB::table('layanans')->select('jenis_layanan_id')->distinct()->get()->pluck('jenis_layanan_id');
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $tagManager = TagManager::first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;  

        return view('frontend.layanan.categories.layananByCategory', compact('data', 'dataSeo', 'metades', 'tentang', 'jenisLayanan', 'jenisLayanan_all', 'menuLayanan', 'asals', 'tujuans', 'jenis_l', 'contacts','tagManager','gtagManager','analytics'));
    }

    public function detailJasaTransportasi($slug)
    {
        $data['title'] = 'Rama Tranz - Detail Layanan Jasa Transportasi | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Detail Layanan Jasa Transportasi';
        $data['url'] = URL::current();


        $detailLayanan = Layanan::where('slug', $slug)->first();
        $jenisLayanan = JenisLayanan::select(['id', 'title', 'slug'])->get();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $fasilitas = FasilitasLayanan::select(['id', 'nama_fasilitas', 'description', 'image'])->get();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $tagManager = TagManager::first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;  
        
        return view('frontend.layanan.layananDetail', compact('dataSeo','data', 'tentang', 'detailLayanan', 'fasilitas', 'jenisLayanan', 'menuLayanan', 'contacts','tagManager','gtagManager','analytics'));
    }   

    public function store(Request $request)
    {
        return $request->all();
        return view('frontend.layanan.searchLayanan');
    }

    public function indexJenisLayanan(){
        $data['title'] = 'Rama Tranz - Layanan Transportasi | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Layanan Ramatranz';
        $data['url'] = URL::current();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;  

        $jenisLayanan = JenisLayanan::select(['id', 'title', 'slug','media','content', 'excerpt'])->get();
        $tagManager = TagManager::first();
        $seoPage = Page::where('slug', '=', 'jadwal')->first();
        $gtagManager = GtagManager::first();
        $metades = env('APP_NAME', 'Default Name') . " memiliki jenis layanan yang dapat memudahkan para pelanggan. Door to door, point to point, dan charter adalah layanan yang unggul.";
        $analytics = Analytics::first();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        return view('frontend.jenis-layanan.index', compact(
                                                'data', 'dataSeo',
                                                'metades',
                                                'tentang',
                                                'menuLayanan',
                                                'jenisLayanan', 
                                                'tagManager',
                                                'seoPage',
                                                'contacts',
                                                'gtagManager',
                                                'analytics'
                                            ));
    }
}
