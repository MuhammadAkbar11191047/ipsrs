<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respon;
use App\Models\Bagian;
use App\Models\Lokasi;
use App\Models\Laporan;
use APP\Models\nampung_petugas;
use App\Models\Petugas;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\ResponExport;
use Maatwebsite\Excel\Facades\Excel;
use App\http\Controllers\Controller; 


class ResponController extends Controller
{
    public function index(){
        $bagian=Bagian::all();
        $petugas=Petugas::all();
        $lokasi=Lokasi::all();
        $laporan=Laporan::where('status','BELUM SELESAI')->get();
        return view('web.respon',compact('bagian','petugas','lokasi','laporan'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'bagian'=>'required',
            'petugas'=>'required',
            'status_pekerjaan'=>'required',
            'lokasi'=>'required',
            'ruangan'=>'required',
            'no_ruangan'=>'required',
            'biaya'=>'required',
            'pekerjaan'=>'required',
            'tanggal'=>'required',
            'bukti'=>'required|image|mimes:jpeg,jpg,png|max:20000',
            'id_laporan' => 'required',

        ]);

        $bukti = $request->bukti;
        $new_bukti = time() . $bukti->getClientOriginalName();

        $data = Respon::create([
            'bagian' => $request->bagian,
            'petugas' => implode(', ', $request->petugas),
            'status_pekerjaan' => $request->status_pekerjaan,
            'lokasi' => $request->lokasi,
            'ruangan' => $request->ruangan,
            'no_ruangan' => $request->no_ruangan,
            'biaya' => $request->biaya,
            'pekerjaan' => $request->pekerjaan,
            'tanggal' => $request->tanggal,
            'bukti' => 'uploads/respon/' . $new_bukti,
            'id_laporan' => $request ->id_laporan,
        ]);
        
        $laporan = Laporan::where('id',$data->id_laporan)->first();
        $dataupdate = ['status'=>'SELESAI DIKERJAKAN'];
        $laporan->update($dataupdate);
        
        Alert::success('Laporan berhasil dikirim');
        $bukti->move('uploads/respon/', $new_bukti);
        return redirect()->to('/respon');
    }

    

    public function export_excel(){
        return Excel::download(new ResponExport,'Respon.xlsx');
    }
}
