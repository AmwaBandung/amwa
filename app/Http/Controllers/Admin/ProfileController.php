<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use DataTables;

class ProfileController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.profile.index');
    }

    public function getProfile()
    {
        $profile = Profile::all();
        return DataTables::of($profile)
            ->addIndexColumn()
            ->addColumn('updated_at', function ($profile) {

                return date('d-m-Y h:i', strtotime($profile->updated_at));
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-pencil" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->deskripsi = $request->deskripsi;
        $profile->save();
        return response()->json([
            'message' => 'Data berhasil diinput'
        ], 200);
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return response()->json([
            'message' => 'Edit Profile',
            'data' => $profile,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->deskripsi = $request->deskripsi;
        $profile->save();

        return response()->json([
            'message' => 'Data berhasil diupdate'
        ], 200);
    }

    public function delete($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return response()->json([
            'message' => 'Data Deleted'
        ], 200);
    }
}
