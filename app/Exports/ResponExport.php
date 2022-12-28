<?php

namespace App\Exports;

use App\Models\Respon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResponExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Respon::select('petugas','bagian','lokasi','ruangan','no_ruangan','biaya','pekerjaan','tanggal','bukti')->get();
    }
    public function headings(): array{
        return ["PETUGAS","BAGIAN","LOKASI","RUANGAN","NO RUANGAN","ESTIMASI BIAYA","PEKERJAAN YANG DILAKUKAN","TANGGAL","BUKTI"];
    }
}
