<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Analytics;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\GtagManager;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\LinkYoutube;
use App\Models\ListOrder;
use App\Models\Page;
use App\Models\ParentArea;
use App\Models\Unggulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Landing;
use App\Models\SearchConsole;
use App\Models\Seo;
use App\Models\TagManager;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = company_config('name');
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Home Screen';
        $data['url'] = URL::current();
		$dataLanding = Landing::first();
        $tagManager = TagManager::first();
        // data SEO
        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;
        // search console
        $searchConsole = SearchConsole::first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        return view('frontend.homescreen.index', compact('data','dataLanding','tagManager','dataSeo','searchConsole','gtagManager','analytics'));
    }

    public function portal()
    {
        $data['title'] = 'Rama Tranz - Beranda | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Beranda';
        $data['url'] = URL::current();

        $layananTarif = Layanan::take(6)->latest()->get();
        $jenisLayanan = JenisLayanan::select(['jenis_layanans.id', 'jenis_layanans.title', 'jenis_layanans.slug','jenis_layanans.media', 'layanans.image'])
            ->leftjoin('layanans', 'layanans.jenis_layanan_id', '=', 'jenis_layanans.id')
            ->orderBy('slug', 'ASC')->get();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $carousel = Carousel::get();
        $hq = Area::where('isHQ', 1)->first();
        $tentang = Page::get()->first();
        $youtube = LinkYoutube::where('id', 1)->first();
        $unggulan = Unggulan::take(6)->get();
        $feedback = Feedback::take(10)->get();        
        $contacts = Kontak::where('id', 1)->first();
        $faqs = Faq::take(6)->get();
        $parentOutlet = ParentArea::get();
		
      	$asals = DB::table('layanans')->select('asal')->distinct()->get()->pluck('asal');
        $tujuans = DB::table('layanans')->select('tujuan')->distinct()->get()->pluck('tujuan');
        $jenis_l = DB::table('layanans')->select('jenis_layanan_id')->distinct()->get()->pluck('jenis_layanan_id');
        $jenisLayanan = JenisLayanan::select(['id', 'title', 'slug','media','content'])->get();
        $layanan = Layanan::latest()->paginate(6)->withQueryString();
        $metades = env('APP_NAME', 'Default Name') . " adalah agen perjalanan yang terbaik dan terpercaya. Lebih dari 11 tahun melayani para pelanggan dengan pelayanan yang terbaik.";
        $tagManager = TagManager::first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        // data SEO
        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;        
        // data seo Home
        $seoPage = Page::where('slug', '=', 'home')->first();        
        $blogs = Blog::latest()->where('status', '=', 'Publish')->paginate(3)->withQueryString();
        $gallery = Gallery::take(15)->latest()->get();
        return view('frontend.beranda.index2', compact(
                                                      'data', 'layananTarif', 'carousel', 'metades',
                                                      'youtube', 'unggulan', 'feedback', 
                                                      'hq', 'contacts', 
                                                      'jenisLayanan', 'tentang', 'parentOutlet', 
                                                      'faqs', 'menuLayanan','asals',
                                                      'tujuans', 'jenis_l','jenisLayanan','layanan','tagManager','dataSeo','seoPage',
                                                      'gtagManager','analytics','blogs','gallery'
                                                     )
                   );
    }

    public function store(Request $request)
    {
        try {                   
            $order = new ListOrder();        
            $order->name = $request->input('name');
            $order->telp = $request->input('telp');
            $order->date = $request->input('date');
            $order->location = $request->input('location');
            $order->time = $request->input('time');
            $order->rute = $request->input('rute');
            $order->numberorder = $request->input('numberorder');
            $order->save();
                
            return redirect()->back()->with('success', 'Link pesan ke WA sudah digenerate');
        } catch (\Exception $e) {            
            return redirect()->back()->with('error', 'Failed to order. Please try again.');
        }
    }
   
}
