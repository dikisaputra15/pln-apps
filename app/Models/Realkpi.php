<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realkpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_indikator_kpi',
        'bobot',
        'polaritas',
        'tahun',
        'bulan',
        'target',
        'realisasi',
        'pencapaian',
        'nilai',
        'status',
    ];
}
