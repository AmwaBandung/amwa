<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umrah;

class UmrahController extends Controller
{
    public function index(){
        $umrah = Umrah::all();

        return view('landing.umrah', compact('umrah'));
    }

    public function umrahDetail($slug){
        $umrah = Umrah::where('slug', $slug)->first();

        return view('landing.umrah_detail', compact('umrah'));
    }
}