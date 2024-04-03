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
        'id_kategori',
        'id_aspirasi',
        'id_indikator',
        'id_satuan',
        'bobot',
        'polaritas',
        'nama_indikator_rkm',
        'polaritas_rkm',
        'satuan_rkm',
    ];
}
