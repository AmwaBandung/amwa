<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\HomeController@index')->name('home');


Route::get('/profil', 'Front\ProfileController@index')->name('profil');
Route::get('/haji', 'Front\HajiController@index')->name('haji');
Route::get('/gallery', 'Front\GalleryController@index')->name('gallery');
Route::group(['prefix' => 'umrah'], function () {
    Route::get('/', 'Front\UmrahController@index')->name('umrah');
    Route::get('/detail/{slug}', 'Front\UmrahController@umrahDetail')->name('umrah.detail');
});

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');


// Route::get('/home', 'HomeController@index')->name('home');