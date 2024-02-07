<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Haji;

class HajiController extends Controller
{
    public function index(){
        $haji = Haji::latest()->first();

        return view('landing.haji', compact('haji'));
    }
}