<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Haji;
use App\Models\Umrah;
use App\Models\Testimoni;
use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Cache URL video desktop untuk waktu yang sangat lama (misalnya, forever)
        $desktopVideoUrlCacheKey = 'desktop_video_url';
        $desktopVideoUrl = Cache::rememberForever($desktopVideoUrlCacheKey, function () {
            return asset('templates/landing/video/amwatour-desktopVideo.mp4');
        });

        $mobileVideoUrlCacheKey = 'mobile_video_url';
        $mobileVideoUrl = Cache::rememberForever($mobileVideoUrlCacheKey, function () {
            return asset('templates/landing/video/amwatour-mobileVideo.mp4');
        });

        // Konten halaman
        $haji = Haji::latest()->first();
        $umrahData = Umrah::latest()->take(5)->get();
        $galleryData = Gallery::latest()->take(5)->get();
        $testimoni = Testimoni::all();

        // Return view hanya dengan URL video
        return view('landing.home', compact('haji', 'umrahData', 'galleryData', 'testimoni', 'desktopVideoUrl', 'mobileVideoUrl'));
    }
}