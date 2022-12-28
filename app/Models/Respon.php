<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    use HasFactory;
    protected $table = 'respon';
    protected $fillable = ['bagian','id_laporan','petugas','status_pekerjaan','lokasi','ruangan','no_ruangan','biaya','pekerjaan','tanggal','bukti'];


    public function laporan(){
        return $this->belongsTo(laporan::class, 'id_laporan');
    }
}
