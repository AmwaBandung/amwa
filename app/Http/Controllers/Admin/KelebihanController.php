<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelebihan;
use Illuminate\Http\Request;
use DataTables;
use Image;

class KelebihanController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.kelebihan.index');
    }

    public function getKelebihan()
    {
        $kelebihan = Kelebihan::all();
        return DataTables::of($kelebihan)
            ->addIndexColumn()
            ->addColumn('updated_at', function ($kelebihan) {

                return date('d-m-Y h:i', strtotime($kelebihan->updated_at));
            })
            ->addColumn('deskripsi_kelebihan', function ($kelebihan) {

                return strip_tags($kelebihan->deskripsi_kelebihan);
            })
            ->addColumn('icon', function ($kelebihan) {
                $url = asset('/asset_web/kelebihan/' . $kelebihan->icon);
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
            ->rawColumns(['action','icon'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $image = $request->file('icon');
        $path = public_path('/asset_web/kelebihan');

        // Proses dan simpan gambar sebagai WebP
        $filename = 'icon_' . time() . '.webp';
        Image::make($image->getRealPath())
            ->fit(75, 75) // Sesuaikan dimensi sesuai kebutuhan
            ->encode('webp')
            ->save($path . '/' . $filename);

        $kelebihanData = $request->input('kelebihan');
        $deskripsiKelebihanData = $request->input('deskripsi_kelebihan');

        $kelebihan = new Kelebihan;
        $kelebihan->kelebihan = $kelebihanData;
        $kelebihan->icon = $filename;
        $kelebihan->deskripsi_kelebihan = $deskripsiKelebihanData;
        $kelebihan->save();

        return response()->json([
            'message' => 'Data berhasil diinput'
        ], 200);
    }

    public function edit($id)
    {
        $kelebihan = Kelebihan::find($id);
        return response()->json([
            'message' => 'Edit Kelebihan',
            'data' => $kelebihan,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $path = public_path('/asset_web/kelebihan');
        $kelebihan = Kelebihan::find($id);

        if ($request->hasFile('icon')) {
            // Hapus icon lama
            $this->deleteOldImage($kelebihan->icon, $path);

            $image = $request->file('icon');

            // Process image and save as WebP
            $filename = 'icon_' . time() . '.webp';
            Image::make($image->getRealPath())
                ->fit(300, 300) // Adjust dimensions as needed
                ->encode('webp')
                ->save($path . '/' . $filename);

            $kelebihan->icon = $filename;
        }

        $kelebihanData = $request->input('kelebihan');
        $deskripsiKelebihanData = $request->input('deskripsi_kelebihan');

        // Update data kelebihan
        $kelebihan->kelebihan = $kelebihanData;
        $kelebihan->deskripsi_kelebihan = $deskripsiKelebihanData;
        $kelebihan->save();

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
        $kelebihan = Kelebihan::find($id);
        $icon = public_path('asset_web/kelebihan/' . $kelebihan->icon);
        unlink($icon);
        $kelebihan->delete();
        return response()->json([
            'message' => 'Data Deleted'
        ], 200);
    }
}
