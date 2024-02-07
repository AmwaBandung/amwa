<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Str;
use Image;
use DataTables;

class TestimoniController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.testimoni.index');
    }

    public function getTestimoni()
    {
        $testimoni = Testimoni::all();
        return DataTables::of($testimoni)
            ->addIndexColumn()
            ->addColumn('updated_at', function ($testimoni) {

                return date('d-m-Y h:i', strtotime($testimoni->updated_at));
            })
            ->addColumn('foto', function ($testimoni) {
                $url = asset('/asset_web/testimoni/' . $testimoni->foto);
                $img = '';
                $img = $img . '<img src="' . $url . '" class="p-0 img-fluid img-thumb" >';
                return $img;
            })
            ->addColumn('testimoni', function ($testimoni) {

                return strip_tags($testimoni->testimoni);
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-pencil" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        // Inisialisasi nilai default untuk foto
        $filename = null;

        // Memeriksa apakah foto diunggah
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $path = public_path('/asset_web/testimoni');

            // Proses dan simpan gambar sebagai WebP
            $filename = 'foto_' . time() . '.webp';
            Image::make($image->getRealPath())
                ->fit(75, 75) // Sesuaikan dimensi sesuai kebutuhan
                ->encode('webp')
                ->save($path . '/' . $filename);
        }

        // Membuat objek Testimoni
        $testi = new Testimoni;
        $testi->nama = $request->nama;
        $testi->foto = $filename;
        $testi->gender = $request->gender;
        $testi->testimoni = $request->testimoni;
        $testi->save();

        return response()->json([
            'message' => 'Data berhasil diinput'
        ], 200);
    }


    public function edit($id)
    {
        $testi = Testimoni::find($id);
        return response()->json([
            'message' => 'Edit Testimoni',
            'data' => $testi,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $path = public_path('/asset_web/testimoni');
        $testi = Testimoni::find($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            $this->deleteOldImage($testi->foto, $path);

            $image = $request->foto;

            // Process image and save as WebP
            $filename = 'foto_' . time() . '.webp';
            Image::make($image->getRealPath())
                ->fit(300, 300) // Adjust dimensions as needed
                ->encode('webp')
                ->save($path . '/' . $filename);

            $testi->foto = $filename;
        }

        $testi->nama = $request->nama;
        $testi->gender = $request->gender;
        $testi->testimoni = $request->testimoni;
        $testi->save();

        return response()->json([
            'message' => 'Data berhasil diupdate'
        ], 200);
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
        $testi = Testimoni::find($id);
        $foto = public_path('asset_web/testimoni/' . $testi->foto);
        unlink($foto);
        $testi->delete();
        return response()->json([
            'message' => 'Data Deleted'
        ], 200);
    }
}