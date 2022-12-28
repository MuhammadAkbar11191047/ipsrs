<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitLapor extends Model
{
    use HasFactory;
    protected $table = 'unit_lapor';
    protected $fillable = ['nama_unit'];

    
}
