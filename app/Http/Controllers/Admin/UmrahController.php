<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umrah;
use Illuminate\Support\Str;
use Image;
use DataTables;

class UmrahController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.umrah.index');
    }
    public function getUmrah()
    {
        $umrah = Umrah::all();
        return DataTables::of($umrah)
            ->addIndexColumn()
            ->addColumn('updated_at', function ($umrah) {

                return date('d-m-Y h:i', strtotime($umrah->updated_at));
            })
            ->addColumn('banner', function ($umrah) {
                $url = asset('asset_web/paket/umrah/' . $umrah->banner);
                $img = '';
                $img = $img . '<img src="' . $url . '" class="p-0 img-fluid img-thumb" >';
                return $img;
            })
            ->addColumn('thumbnail', function ($umrah) {
                $url = asset('asset_web/paket/umrah/' . $umrah->thumbnail);
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
        $path = public_path() . '/asset_web/paket/umrah';
        $rawName = $request->nama;
        $cleanedName = trim($rawName);

        // Timestamp
        $timestamp = time();

        // Thumbnail
        $thumbnail = $request->thumbnail;
        $thumbnail_name = $cleanedName . '_thumbnail_' . $timestamp . '.webp';

        $thumbnail_img = Image::make($thumbnail->path());

        $thumbnail_img->resize(1024, 768, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save($path . '/' . $thumbnail_name);

        // Banner
        $banner = $request->banner;
        $banner_name = $cleanedName . '_banner_' . $timestamp . '.webp';

        $banner_img = Image::make($banner->path());

        $banner_img->resize(1000, 585, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('webp')->save($path . '/' . $banner_name);

        // Menghilangkan tanda "Rp" dan tanda titik (".") dari string harga
        $harga = str_replace(['Rp', '.'], '', $request->input('harga'));

        // Konversi string harga ke integer
        $hargaInt = (int) $harga;

        $umrah = new Umrah;
        $umrah->nama = $request->nama;
        $umrah->slug = Str::slug($request->nama);
        $umrah->status = $request->status;
        $umrah->maskapai = $request->maskapai;
        $umrah->thumbnail = $thumbnail_name;
        $umrah->banner = $banner_name;
        $umrah->harga = $hargaInt;
        $umrah->hotel = $request->hotel;
        $umrah->itenary = $request->itenary;
        $umrah->harga_termasuk = $request->harga_termasuk;
        $umrah->harga_tidak = $request->harga_tidak;
        $umrah->pendaftaran = $request->pendaftaran;
        $umrah->save();

        return response()->json([
            'message' => 'Data Berhasil Di Input'
        ]);
    }

    public function edit($id)
    {
        $umrah = Umrah::find($id);
        return response()->json([
            'message' => 'Edit Umrah',
            'data' => $umrah,
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $path = public_path() . '/asset_web/paket/umrah';
        $rawName = $request->nama;
        $cleanedName = trim($rawName);

        // Menghilangkan tanda "Rp" dan tanda titik (".") dari string harga
        $harga = str_replace(['Rp', '.'], '', $request->input('harga'));

        // Konversi string harga ke integer
        $hargaInt = (int) $harga;

        $umrah = Umrah::find($id);

        // Hapus gambar lama
        $umrah->nama = $request->nama;
        $umrah->slug = Str::slug($request->nama);
        $umrah->status = $request->status;
        $umrah->maskapai = $request->maskapai;
        $umrah->harga = $hargaInt;
        $umrah->hotel = $request->hotel;
        $umrah->itenary = $request->itenary;
        $umrah->harga_termasuk = $request->harga_termasuk;
        $umrah->harga_tidak = $request->harga_tidak;
        $umrah->pendaftaran = $request->pendaftaran;

        if ($request->hasFile('thumbnail')) {

            // Thumbnail
            $thumbnail = $request->file('thumbnail');
            $thumbnail_name = $cleanedName . '_thumbnail_' . time() . '.webp';

            $thumbnail_img = Image::make($thumbnail->path());

            $thumbnail_img->resize(1024, 768, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->save($path . '/' . $thumbnail_name);
            $this->deleteOldImage($umrah->thumbnail, $path);
            $umrah->thumbnail = $thumbnail_name;
        }

        if ($request->hasFile('banner')) {

            // Banner
            $banner = $request->file('banner');
            $banner_name = $cleanedName . '_banner_' . time() . '.webp';

            $banner_img = Image::make($banner->path());

            $banner_img->resize(1000, 585, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp')->save($path . '/' . $banner_name);
            $this->deleteOldImage($umrah->banner, $path);
            $umrah->banner = $banner_name;
        }

        $umrah->save();

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
        $umrah = Umrah::find($id);
        // dd($umrah);
        $thumbpath = public_path('asset_web/paket/umrah/' . $umrah->thumbnail);
        unlink($thumbpath);

        $bannerpath = public_path('asset_web/paket/umrah/' . $umrah->banner);
        unlink($bannerpath);
        $umrah->delete();

        return response()->json([
            'message' => 'Data Deleted',
            'data' => $umrah
        ], 200);
    }
}
