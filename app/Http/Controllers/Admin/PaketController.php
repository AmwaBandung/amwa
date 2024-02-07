<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PaketController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.paket.index');
    }
}
?>