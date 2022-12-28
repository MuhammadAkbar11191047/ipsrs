<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class HistoryLaporanController extends Controller
{
    public function index(Request $request){

        $keyword = $request->keyword;
        $data = Laporan::where('nama','LIKE','%'.$keyword.'%')->orWhere('unit_lapor','LIKE','%'.$keyword.'%')->paginate(10);
        
        return view('admin.history_laporan.index',compact('data'));
    }   
}


