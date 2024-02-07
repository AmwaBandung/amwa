<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use DataTables;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.gallery.index');
    }
    public function getGallery()
    {
        $gallery = Gallery::all();
        return DataTables::of($gallery)
            ->addIndexColumn()
            ->addColumn('updated_at', function ($gallery) {

                return date('d-m-Y h:i', strtotime($gallery->updated_at));
            })
            ->addColumn('media', function ($gallery) {
                $url = asset('asset_web/gallery/' . $gallery->media);

                // Tambahkan kondisi untuk menentukan apakah media adalah gambar atau video
                if ($gallery->media_type === 'Image') {
                    // Jika gambar, tampilkan tag img
                    $mediaTag = '<img src="' . $url . '" class="p-0 img-fluid img-thumb" >';
                } elseif ($gallery->media_type === 'Video') {
                    // Jika video, tampilkan tag video
                    $mediaTag = '<video width="320" height="240" controls>
                                    <source src="' . $url . '" type="video/mp4">
                                    Your browser does not support the video tag.
                                 </video>';
                } else {
                    // Jenis media tidak dikenali, mungkin ada penanganan khusus yang perlu ditambahkan
                    $mediaTag = 'Unsupported Media Type';
                }

                return $mediaTag;
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-pencil" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['media', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $path = public_path() . '/asset_web/gallery';
        $rawName = $request->title;
        $cleanedName = trim($rawName);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->slug = Str::slug($cleanedName);
        $gallery->media_type = $request->media_type;
        $gallery->aspect_ratio = $request->aspect_ratio;

        if ($request->media_type === 'Image') {
            // Upload gambar jika media yang dipilih adalah gambar
            $media = $request->media;
            $timestamp = time();
            $media_name = $cleanedName . '_media_' . $timestamp . '.webp';

            // Resize dan simpan gambar ke format WebP
            $image = Image::make($media->path());

            // Resize gambar jika perlu
            if ($request->aspect_ratio === '1:1') {
                $image->fit(300, 300); // Ganti dimensi sesuai kebutuhan
            } elseif ($request->aspect_ratio === '16:9') {
                $image->resize(640, 360); // Ganti dimensi sesuai kebutuhan
            } elseif ($request->aspect_ratio === '4:3') {
                $image->resize(640, 480); // Ganti dimensi sesuai kebutuhan
            } elseif ($request->aspect_ratio === '9:16') {
                $image->resize(360, 640);
            }

            // Konversi dan simpan gambar ke format WebP
            $image->encode('webp')->save($path . '/' . $media_name);

            $gallery->media = $media_name;
        } elseif ($request->media_type === 'Video') {
            // Upload video jika media yang dipilih adalah video
            $media = $request->file('media');
            $media_ext = $media->getClientOriginalExtension();
            $media_name = $cleanedName . '_media.' . $media_ext;

            $media->move($path, $media_name);

            $gallery->media = $media_name;
        }

        $gallery->save();
        Cache::forget('gallery_page');

        return response()->json([
            'message' => 'Data Berhasil Di Input'
        ]);
    }


    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return response()->json([
            'message' => 'Edit Gallery',
            'data' => $gallery,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $path = public_path() . '/asset_web/gallery';
        $rawName = $request->title;
        $cleanedName = trim($rawName);

        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->slug = Str::slug($cleanedName);
        $gallery->media_type = $request->media_type;
        $gallery->aspect_ratio = $request->aspect_ratio;

        if ($request->media_type === 'Image') {
            // Jika media yang dipilih adalah gambar
            if ($request->hasFile('media') && $request->aspect_ratio) {
                // Hapus gambar lama sebelum mengganti dengan yang baru


                $media = $request->file('media');
                $timestamp = time();
                $media_name = $cleanedName . '_media_' . $timestamp . '.webp';

                $image = Image::make($media->path());

                // Resize gambar jika perlu
                if ($request->aspect_ratio === '1:1') {
                    $image->fit(300, 300);
                } elseif ($request->aspect_ratio === '16:9') {
                    $image->resize(640, 360);
                } elseif ($request->aspect_ratio === '4:3') {
                    $image->resize(640, 480);
                } elseif ($request->aspect_ratio === '9:16') {
                    $image->resize(360, 640);
                }

                $this->deleteOldImage($gallery->media, $path);
                // Konversi dan simpan gambar ke format WebP
                $image->encode('webp')->save($path . '/' . $media_name);

                $gallery->media = $media_name;
            }
        } elseif ($request->media_type === 'Video') {
            // Jika media yang dipilih adalah video
            if ($request->hasFile('media')) {
                // Hapus file lama sebelum mengganti dengan yang baru


                $media = $request->file('media');
                $media_ext = $media->getClientOriginalExtension();
                $media_name = $cleanedName . '_media.' . $media_ext;

                $this->deleteOldImage($gallery->media, $path);
                $media->move($path, $media_name);

                $gallery->media = $media_name;
            }
        }

        $gallery->save();
        Cache::forget('gallery_page');

        return response()->json([
            'message' => 'Data Berhasil Di Update'
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
        $gallery = Gallery::find($id);

        // Hapus file media terlebih dahulu
        if ($gallery->media_type === 'Image') {
            $media_path = public_path('asset_web/gallery/' . $gallery->media);
            unlink($media_path);
        } elseif ($gallery->media_type === 'Video') {
            $media_path = public_path('asset_web/gallery/' . $gallery->media);
            unlink($media_path);
        }

        // Hapus catatan galeri dari database
        $gallery->delete();
        Cache::forget('gallery_page');


        return response()->json([
            'message' => 'Data Deleted',
            'data' => $gallery
        ], 200);
    }
}
