<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realkpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_unit_induk',
        'id_pelaksana',
        'id_layanan',
        'id_indikator_kpi',
        'bulan',
        'target',
        'realisasi',
        'pencapaian',
        'nilai',
        'status',
        'penjelasan',
    ];

     // Relasi ke KPI
     public function kpi()
     {
         return $this->belongsTo(Kpi::class, 'id_indikator_kpi');
     }
}
