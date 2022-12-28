<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    public function index(){
        $data = Lokasi::latest()->paginate(10);
        return view('admin.lokasi.index',compact('data'));
    }

    public function create(){
        return view('admin.lokasi.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_lokasi' => 'required'
        ]);

        $data = Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi
        ]);

        Alert::success('Data berhasil ditambahkan');
        return redirect()->route('lokasi.index');


    }

    public function edit($id){
        $data = Lokasi::FindOrFail($id);
        return view('admin.lokasi.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_lokasi' => 'required'
        ]);

        $data = Lokasi::FindOrFail($id);

        $data_update = [
            'nama_lokasi' => $request->nama_lokasi
        ];

        $data->update($data_update);
        Alert::success('Data berhasil diupdate');
    }

    public function destroy($id){
        $data = Lokasi::FindOrFail($id);
        $data->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->route('lokasi.index');
    }

}
