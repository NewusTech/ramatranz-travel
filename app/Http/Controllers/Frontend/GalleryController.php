<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JenisLayanan;
use App\Models\Gallery;
use App\Models\Kontak;
use App\Models\TagManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Seo;


class GalleryController extends Controller
{
    public function index()
    {
        $data['title'] = company_config('name');
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Gallery';
        $data['url'] = URL::current();
        $menuLayanan = JenisLayanan::select(['id', 'title', 'slug'])->orderBy('slug', 'ASC')->get();
        $jenisLayanan = JenisLayanan::select(['id', 'title', 'slug','media','content'])->get(); 
        $metades = env('APP_NAME', 'Default Name') . " adalah jasa transportasi berkualitas. Gunakan jasa transportasi hanya disini";
        $seoTools = Seo::first();
        $dataSeo['site_title'] = $seoTools->site_title;
        $dataSeo['title'] = $seoTools->home_title;
        $dataSeo['description'] = $seoTools->site_description;
        $dataSeo['keywords'] = $seoTools->keywords;
        $dataSeo['image'] = $seoTools->image;
        $contacts = Kontak::where('id', 1)->first();

        $gallery = Gallery::get();
        $tagManager = TagManager::first();       
        return view('frontend.gallery.index', compact('gallery', 'contacts', 'dataSeo','tagManager', 'menuLayanan', 'jenisLayanan', 'metades'));
    }

    public function filterGallery(Request $request){
        $data['title'] = company_config('name');
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik.';
        $data['type'] = 'Gallery';
        $data['url'] = URL::current();

        if($request->category){
            $gallery = Gallery::latest()->where('category', $request->category)->get();
        }else{
            $gallery = Gallery::latest()->get();
        }
        $tagManager = TagManager::first();
        return response()->json($gallery);
        // return view('frontend.gallery.index', compact('gallery','tagManager'));
    }

}