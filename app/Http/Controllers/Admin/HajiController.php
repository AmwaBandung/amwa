<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Haji;
use Illuminate\Support\Str;
use Image;
use DataTables;

class HajiController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.haji.index');
    }
    public function getHaji()
    {
        $haji = Haji::all();
        return DataTables::of($haji)
            ->addIndexColumn()
            ->addColumn('updated_at', function ($haji) {

                return date('d-m-Y h:i', strtotime($haji->updated_at));
            })
            ->addColumn('banner', function ($haji) {
                $url = asset('asset_web/paket/haji/' . $haji->banner);
                $img = '';
                $img = $img . '<img src="' . $url . '" class="p-0 img-fluid img-thumb" >';
                return $img;
            })
            ->addColumn('thumbnail', function ($haji) {
                $url = asset('asset_web/paket/haji/' . $haji->thumbnail);
                $img = '';
                $img = $img . '<img src="' . $url . '" class="p-0 img-fluid img-thumb" >';
                return $img;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-pencil" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['banner', 'thumbnail', 'action'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $timestamp = time();
        $path = public_path() . '/asset_web/paket/haji';
        $rawName = $request->nama;
        $cleanedName = trim($rawName);

        // Thumbnail
        $thumbnail = $request->thumbnail;
        $thumbnail_name = $cleanedName . '_thumbnail_' . $timestamp . '.webp'; // Simpan sebagai file WebP

        $thumbnail_img = Image::make($thumbnail->path());

        // Resize dan simpan thumbnail
        $thumbnail_img->resize(1024, 768, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Konversi dan simpan thumbnail ke format WebP
        $thumbnail_img->encode('webp')->save($path . '/' . $thumbnail_name);

        // Banner
        $banner = $request->banner;
        $banner_name = $cleanedName . '_banner_' . $timestamp . '.webp'; // Simpan sebagai file WebP

        $banner_img = Image::make($banner->path());

        // Resize dan simpan banner
        $banner_img->resize(1000, 585, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Konversi dan simpan banner ke format WebP
        $banner_img->encode('webp')->save($path . '/' . $banner_name);

        // Menghilangkan tanda "Rp" dan tanda titik (".") dari string harga
        $dp = str_replace(['Rp', '.'], '', $request->input('dp'));

        // Konversi string dp ke integer
        $dpInt = (int) $dp;

        $haji = new Haji;
        $haji->nama = $request->nama;
        $haji->slug = Str::slug($request->nama);
        $haji->thumbnail = $thumbnail_name;
        $haji->banner = $banner_name;
        $haji->dp = $dpInt;
        $haji->hotel = $request->hotel;
        $haji->itenary = $request->itenary;
        $haji->harga_termasuk = $request->harga_termasuk;
        $haji->harga_tidak = $request->harga_tidak;
        $haji->pendaftaran = $request->pendaftaran;
        $haji->save();

        return response()->json([
            'message' => 'Data Berhasil Di Input'
        ]);
    }

    public function edit($id)
    {
        $haji = Haji::find($id);
        return response()->json([
            'message' => 'Edit Haji',
            'data' => $haji,
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $timestamp = time();
        $path = public_path() . '/asset_web/paket/haji';
        $rawName = $request->nama;
        $cleanedName = trim($rawName);

        // Menghilangkan tanda "Rp" dan tanda titik (".") dari string harga
        $dp = str_replace(['Rp', '.'], '', $request->input('dp'));

        // Konversi string dp ke integer
        $dpInt = (int) $dp;

        $haji = Haji::find($id);
        $haji->nama = $request->nama;
        $haji->slug = Str::slug($request->nama);
        $haji->dp = $dpInt;
        $haji->hotel = $request->hotel;
        $haji->itenary = $request->itenary;
        $haji->harga_termasuk = $request->harga_termasuk;
        $haji->harga_tidak = $request->harga_tidak;
        $haji->pendaftaran = $request->pendaftaran;

        if ($request->hasFile('thumbnail')) {
            // Menghapus gambar lama
            

            // Thumbnail
            $thumbnail = $request->file('thumbnail');
            $thumbnail_name = $cleanedName . '_thumbnail_' . $timestamp . '.webp'; // Simpan sebagai file WebP

            $thumbnail_img = Image::make($thumbnail->path());

            // Resize dan simpan thumbnail
            $thumbnail_img->resize(1024, 768, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Konversi dan simpan thumbnail ke format WebP
            $thumbnail_img->encode('webp')->save($path . '/' . $thumbnail_name);
            $this->deleteOldImage($haji->thumbnail, $path);
            $haji->thumbnail = $thumbnail_name;
            
        }

        if ($request->hasFile('banner')) {
            // Menghapus gambar lama
           

            // Banner
            $banner = $request->file('banner');
            $banner_name = $cleanedName . '_banner_' . $timestamp . '.webp'; // Simpan sebagai file WebP

            $banner_img = Image::make($banner->path());

            // Resize dan simpan banner
            $banner_img->resize(1000, 585, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Konversi dan simpan banner ke format WebP
            $banner_img->encode('webp')->save($path . '/' . $banner_name);
            $this->deleteOldImage($haji->banner, $path);
            $haji->banner = $banner_name;
            
        }

        $haji->save();

        return response()->json([
            'message' => 'Data Berhasil Diupdate'
        ]);
    }

    private function deleteOldImage($filename, $path)
    {
        $oldImagePath = $path . '/' . $filename;

        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }


    public function delete($id)
    {
        $haji = Haji::find($id);
        // dd($haji);
        $thumbpath = public_path('asset_web/paket/haji/' . $haji->thumbnail);
        unlink($thumbpath);

        $bannerpath = public_path('asset_web/paket/haji/' . $haji->banner);
        unlink($bannerpath);
        $haji->delete();

        return response()->json([
            'message' => 'Data Deleted',
            'data' => $haji
        ], 200);
    }
}
