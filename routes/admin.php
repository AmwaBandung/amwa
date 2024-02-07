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

Route::group(['prefix' => 'amwa-admin'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });

    Auth::routes();
    Route::group(['prefix' => 'testimoni'], function () {
        Route::get('/index', 'Admin\TestimoniController@index')->name('testimoni.admin.index');
        Route::post('/store', 'Admin\TestimoniController@store')->name('testimoni.admin.store');
        Route::get('/getTestimoni', 'Admin\TestimoniController@getTestimoni')->name('testimoni.admin.data');
        Route::get('/edit/{id}', 'Admin\TestimoniController@edit')->name('testimoni.admin.edit');
        Route::post('/update/{id}', 'Admin\TestimoniController@update')->name('testimoni.admin.update');
        Route::delete('/delete/{id}', 'Admin\TestimoniController@delete')->name('testimoni.admin.delete');
    });

    Route::group(['prefix' => 'haji'], function () {
        Route::get('/index', 'Admin\HajiController@index')->name('haji.admin.index');
        Route::post('/store', 'Admin\HajiController@store')->name('haji.admin.store');
        Route::get('/getHaji', 'Admin\HajiController@getHaji')->name('haji.admin.data');
        Route::get('/edit/{id}', 'Admin\HajiController@edit')->name('haji.admin.edit');
        Route::post('/update/{id}', 'Admin\HajiController@update')->name('haji.admin.update');
        Route::delete('/delete/{id}', 'Admin\HajiController@delete')->name('haji.admin.delete');
    });

    Route::group(['prefix' => 'umrah'], function () {
        Route::get('/index', 'Admin\UmrahController@index')->name('umrah.admin.index');
        Route::post('/store', 'Admin\UmrahController@store')->name('umrah.admin.store');
        Route::get('/getUmrah', 'Admin\UmrahController@getUmrah')->name('umrah.admin.data');
        Route::get('/edit/{id}', 'Admin\UmrahController@edit')->name('umrah.admin.edit');
        Route::post('/update/{id}', 'Admin\UmrahController@update')->name('umrah.admin.update');
        Route::delete('/delete/{id}', 'Admin\UmrahController@delete')->name('umrah.admin.delete');
    });

    Route::group(['prefix' => 'gallery'], function () {
        Route::get('/index', 'Admin\GalleryController@index')->name('gallery.admin.index');
        Route::post('/store', 'Admin\GalleryController@store')->name('gallery.admin.store');
        Route::get('/getGallery', 'Admin\GalleryController@getGallery')->name('gallery.admin.data');
        Route::get('/edit/{id}', 'Admin\GalleryController@edit')->name('gallery.admin.edit');
        Route::post('/update/{id}', 'Admin\GalleryController@update')->name('gallery.admin.update');
        Route::delete('/delete/{id}', 'Admin\GalleryController@delete')->name('gallery.admin.delete');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/index', 'Admin\ProfileController@index')->name('profile.admin.index');
        Route::post('/store', 'Admin\ProfileController@store')->name('profile.admin.store');
        Route::get('/getProfile', 'Admin\ProfileController@getProfile')->name('profile.admin.data');
        Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('profile.admin.edit');
        Route::post('/update/{id}', 'Admin\ProfileController@update')->name('profile.admin.update');
        Route::delete('/delete/{id}', 'Admin\ProfileController@delete')->name('profile.admin.delete');
    });
    Route::group(['prefix' => 'kelebihan'], function () {
        Route::get('/index', 'Admin\KelebihanController@index')->name('kelebihan.admin.index');
        Route::post('/store', 'Admin\KelebihanController@store')->name('kelebihan.admin.store');
        Route::get('/getKelebihan', 'Admin\KelebihanController@getKelebihan')->name('kelebihan.admin.data');
        Route::get('/edit/{id}', 'Admin\KelebihanController@edit')->name('kelebihan.admin.edit');
        Route::post('/update/{id}', 'Admin\KelebihanController@update')->name('kelebihan.admin.update');
        Route::delete('/delete/{id}', 'Admin\KelebihanController@delete')->name('kelebihan.admin.delete');
    });
});
