<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Laporan::select('nama','email','tempat_ruang','unit_lapor','tanggal','perihal','detail','bukti')->get();
    }

    public function headings(): array{
        return ["NAMA","EMAIL","TEMPAT_RUANGAN","NAMA UNIT","TANGGAL","PERIHAL","DETAIL","BUKTI"];
    }
}
