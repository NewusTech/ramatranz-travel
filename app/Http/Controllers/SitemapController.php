<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Blog;
use App\Models\Layanan;
use App\Models\JenisLayanan;
use App\Models\ParentArea;
class SitemapController extends Controller
{
    public function index()
    {

        $routes = collect(Route::getRoutes())->filter(function ($route) {
            // Filter out routes you want to exclude
            $excludedRoutes = ['log-viewer', '_debugbar', '_ignition', 'register', 'forgot-password', 'reset-password', 'terms-of-service', 'privacy-policy', 'link', 'sitemap', 'login', 'logout', 'two-factor-challenge', 'user', 'livewire', 'input-review', 'order-store', 'api', 'lokasi-kami/{key}', 'layanan/{key}', 'sanctum'];
            foreach ($excludedRoutes as $excluded) {
                if (str_contains($route->uri(), $excluded)) {
                    return false;
                }
            }
            return true;
        })->map(function ($route) {
            return [
                'loc' => url($route->uri()),
                'lastmod' => now()->toAtomString(),
            ];
        });
        
        $data = $routes->toArray();

        $blog = Blog::all(); 
        $layanan = Layanan::all();
        $jenisLayanan = JenisLayanan::all();
        $lokasi = ParentArea::all();
        
        $xml = View::make('sitemap', compact('data', 'blog', 'layanan', 'jenisLayanan', 'lokasi'))->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
