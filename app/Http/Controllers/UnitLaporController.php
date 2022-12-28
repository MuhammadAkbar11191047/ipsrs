<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitLapor;
use RealRashid\SweetAlert\Facades\Alert;

class UnitLaporController extends Controller
{
    public function index(){
        $data = UnitLapor::latest()->paginate(10);
        return view('admin.unit_lapor.index',compact('data'));
    }

    public function create(){
        return view('admin.unit_lapor.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_unit' => 'required'
        ]);

        $data = UnitLapor::create([
            'nama_unit' => $request->nama_unit
        ]);

        Alert::success('Data berhasil ditambahkan');
        return redirect()->route('unit-lapor.index');


    }

    public function edit($id){
        $data = UnitLapor::FindOrFail($id);
        return view('admin.unit_lapor.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_unit' => 'required'
        ]);

        $data = UnitLapor::FindOrFail($id);

        $data_update = [
            'nama_unit' => $request->nama_unit
        ];

        $data->update($data_update);
        Alert::success('Data berhasil diupdate');
    }

    public function destroy($id){
        $data = UnitLapor::FindOrFail($id);
        $data->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->route('unit-lapor.index');
    }
}
