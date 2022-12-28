<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bagian;
use RealRashid\SweetAlert\Facades\Alert;

class BagianController extends Controller
{
    public function index(){
        $data = Bagian::latest()->paginate(10);
        return view('admin.bagian.index',compact('data'));
    }

    public function create(){
        return view('admin.bagian.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_bagian' => 'required'
        ]);

        $data = Bagian::create([
            'nama_bagian' => $request->nama_bagian
        ]);

        Alert::success('Data berhasil ditambahkan');
        return redirect()->route('bagian.index');


    }

    public function edit($id){
        $data = Bagian::FindOrFail($id);
        return view('admin.bagian.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_bagian' => 'required'
        ]);

        $data = Bagian::FindOrFail($id);

        $data_update = [
            'nama_bagian' => $request->nama_bagian
        ];

        $data->update($data_update);
        Alert::success('Data berhasil diupdate');
    }

    public function destroy($id){
        $data = Bagian::FindOrFail($id);
        $data->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->route('bagian.index');
    }

}
