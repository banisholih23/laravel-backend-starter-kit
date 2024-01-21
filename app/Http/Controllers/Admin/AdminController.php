<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function list() 
    {
        $admin = Admin::all();
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $admin
        ], 200);
    }

    public function kelurahan() 
    {
        $data = Kelurahan::paginate(100);
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $data
        ], 200);
    }

    public function kecamatan() 
    {
        $data = Kecamatan::paginate();
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $data
        ], 200);
    }

    public function kabupaten() 
    {
        $data = Kabupaten::paginate();
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $data
        ], 200);
    }

    public function provinsi() 
    {
        $data = Provinsi::paginate();
        return response()->json([
            'code' => 200,
            'msg' => 'success',
            'data' => $data
        ], 200);
    }
}
