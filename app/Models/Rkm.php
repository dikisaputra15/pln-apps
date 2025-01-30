<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_unit_induk',
        'id_pelaksana',
        'id_layanan',
        'aspirasi_rkm',
        'indikator_kinerja_kpi',
        'bobot_rkm',
        'polaritas_rkm',
        'indikator_rkm',
        'id_satuan_rkm',
    ];
}
