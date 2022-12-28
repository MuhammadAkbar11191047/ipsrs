<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respon;
use App\Models\nampung_petugas;

class HistoryResponController extends Controller
{
    public function index(Request $request){

        $keyword = $request->keyword;
        $data = Respon::where('bagian','LIKE','%'.$keyword.'%')->paginate(10);
        
        // $data = Respon::with('unit_petugas')->latest()->paginate('10');
        return view('admin.history_respon.index',compact('data'));
    }
    
}
