<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapkinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_aspirasi',
        'id_indikator',
        'id_unit_induk',
        'id_pelaksana',
        'id_layanan',
        'tahun',
        'bulan',
        'target',
        'realisasi',
        'pencapaian',
        'nilai',
        'status',
        'penjelasan',
    ];
}
