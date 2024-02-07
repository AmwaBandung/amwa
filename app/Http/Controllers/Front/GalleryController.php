<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function index()
    {
        $cacheKey = 'gallery_page';

        return Cache::rememberForever($cacheKey, function () {
            // Konten halaman
            $gallery = Gallery::all();
            return view('landing.gallery', compact('gallery'))->render();
        });
    }
}
