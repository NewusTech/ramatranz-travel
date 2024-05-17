<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Kontak;
use App\Models\GtagManager;
use App\Models\Page;
use App\Models\Analytics;
use App\Models\TagManager;
use App\Models\Feedback;

class ReviewController extends Controller
{
    public function index()
    {
        $data['title'] = 'Rama Tranz - Review Kami | Rama Trans Travel';
        $data['image'] = '';
        $data['intro'] = 'Rama Trans adalah jasa Transportasi Terbaik dan dijamin terpercaya.';
        $data['url'] = URL::current();
       
        $tagManager = TagManager::first();
        $seoPage = Page::where('slug', '=', 'blog')->first();
        $metades = "Percayakan " . env('APP_NAME', 'Default Name') . " sebagai agen perjalanan anda bersama keluarga dengan menyenangkan dan harga yang murah.";
        $gtagManager = GtagManager::first();
        $analytics = Analytics::first();
        $contacts = Kontak::where('id', 1)->first();
        return view('frontend.review.index', compact('data','tagManager','seoPage', 'metades','gtagManager','analytics', 'contacts'));
    }

    public function inputreview(Request $request)
    {        
        $request->validate([
            'name_review' => 'required|string',
            'input_review' => 'required|string',
            'no_hp' => 'required|numeric',
            'rating_review' => 'required|numeric|min:1',
        ]);

        try {
            $review = new Feedback();
            $review->title = $request->input('name_review');
            $review->desc = $request->input('input_review');
            $review->rating = $request->input('rating_review');
            $review->no_hp = $request->input('no_hp');
            
            if ($request->file('image_review')) {
                $gambarPath = $request->file('image_review')->store('ramatrans/feedback', 's3');
                $review->image = $gambarPath;
            }     
            
            $review->save();
            
            return response()->json(['status' => 'success', 'message' => 'Review berhasil disimpan!']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan review. Silakan coba lagi.');
        }    
    }
}
