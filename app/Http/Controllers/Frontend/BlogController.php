<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Analytics;
use App\Models\Blog;
use App\Models\GtagManager;
use App\Models\JenisLayanan;
use App\Models\Kontak;
use App\Models\Page;
use App\Models\TagManager;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Seo;

class BlogController extends Controller
{
    public function index()
    {
        $data['title'] = 'Rama Tranz - Blog Kami | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Home Screen';
        $data['url'] = URL::current();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;       

        $blogs = Blog::latest()->where('status', '=', 'Publish')->paginate(9)->withQueryString();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $tagManager = TagManager::first();
        $seoPage = Page::where('slug', '=', 'blog')->first();
        $metades = "Bepergian dengan cepat dan aman hanya dapat ditemukan di " . env('APP_NAME', 'Default Name') . ". Tidak perlu diragukan adalah jasa travel terbaik.";
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        return view('frontend.blog.index', compact('data', 'dataSeo', 'blogs', 'contacts', 'tentang', 'menuLayanan','tagManager','seoPage', 'metades','gtagManager','analytics'));
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('query');
        $title2 = $request->input('page');
        $blogs = Blog::where('status', '=', 'Publish')
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'LIKE', "%$query%")
                    ->orWhere('excerpt', 'LIKE', "%$query%");
            })
            ->paginate(9);

        return view('frontend.blog.blog-list', compact('blogs', 'title2'));
    }

    public function detailBlog($slug)
    {
        $data['title'] = 'Rama Tranz - Detail Layanan Jasa Transportasi | Rama Transportasi';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Detail Layanan Jasa Transportasi';
        $data['url'] = URL::current();

        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;       

        $detailBlog = Blog::where('slug', $slug)->first();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $contacts = Kontak::where('id', 1)->first();
        $tentang = Page::get()->first();
        $tagManager = TagManager::first();
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        return view('frontend.blog.blogDetail', compact('data', 'dataSeo','detailBlog', 'contacts', 'tentang', 'menuLayanan','tagManager','gtagManager','analytics'));
    }
}
