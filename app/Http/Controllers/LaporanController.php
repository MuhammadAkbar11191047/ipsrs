<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\UnitLapor;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\http\Controllers\Controller; 


class LaporanController extends Controller
{
    public function index(){
        $data = UnitLapor::all();
        return view('web.laporan.create',compact('data'));
    }


    

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'perihal' => 'required|max:500',
            'detail' => 'required',
            'tempat_ruang' => 'required',
            'tanggal' => 'required',
            'detail' => 'required',
            'unit_lapor' => 'required',
            'bukti' => 'required|image|mimes:jpeg,jpg,png|max:20000',
        ]);

        $bukti = $request->bukti;
        $new_bukti = time() . $bukti->getClientOriginalName();

        $data = Laporan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tempat_ruang' => $request->tempat_ruang,
            'perihal' => $request->perihal,
            'detail' => $request->detail,
            'tanggal' => $request->tanggal,
            'unit_lapor' => $request->unit_lapor,
            'bukti' => 'uploads/bukti/' . $new_bukti,
            'status' => 'BELUM SELESAI'
        ]);
        Alert::success('Laporan berhasil dikirim');
        $bukti->move('uploads/bukti/', $new_bukti);
        return redirect()->to('/');
    }

    public function export_excel(){
        return Excel::download(new LaporanExport,'Laporan.xlsx');
    }
}
