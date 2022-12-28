<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function index(){
        $data = Petugas::latest()->paginate(10);
        return view('admin.petugas.index',compact('data'));
    }

    public function create(){
        return view('admin.petugas.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_petugas' => 'required'
        ]);

        $data = Petugas::create([
            'nama_petugas' => $request->nama_petugas
        ]);

        Alert::success('Data berhasil ditambahkan');
        return redirect()->route('petugas.index');


    }

    public function edit($id){
        $data = Petugas::FindOrFail($id);
        return view('admin.petugas.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_petugas' => 'required'
        ]);

        $data = Petugas::FindOrFail($id);

        $data_update = [
            'nama_petugas' => $request->nama_petugas
        ];

        $data->update($data_update);
        Alert::success('Data berhasil diupdate');
    }

    public function destroy($id){
        $data = Petugas::FindOrFail($id);
        $data->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->route('petugas.index');
    }
}
