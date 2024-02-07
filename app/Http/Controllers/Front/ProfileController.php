<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Kelebihan;

class ProfileController extends Controller
{
    public function index(){
        $profile = Profile::latest()->first();
        $kelebihan = Kelebihan::all();
        
        return view('landing.profil', compact('profile','kelebihan'));
    }
}