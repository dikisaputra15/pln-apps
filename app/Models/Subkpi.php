<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kpi',
        'nama_sub_kpi',
    ];

      // Relasi ke KPI utama
      public function kpi()
      {
          return $this->belongsTo(Kpi::class, 'id_kpi');
      }

      // Relasi ke Realisasi KPI
    public function realisasi()
    {
        return $this->hasMany(Realkpi::class, 'id_indikator_kpi');
    }
}
