<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator_kinerja',
        'jenis_indikator',
        'id_kategori',
        'id_satuan',
        'bobot',
        'polaritas',
        'tahun',
    ];

    public function subkpi()
    {
        return $this->hasMany(Subkpi::class, 'id_kpi');
    }

    public function realkpi()
    {
        return $this->hasMany(Realkpi::class, 'id_indikator_kpi');
    }
}
