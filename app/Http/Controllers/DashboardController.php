<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Respon;

class DashboardController extends Controller
{
    public function index(){
        $data = Laporan::all();
        $datarespon = Respon::all();
        $datalap = Laporan::count();
        $datares = Respon::count();
        return view('admin.dashboard',compact('data','datarespon','datalap','datares'));
    }
}
