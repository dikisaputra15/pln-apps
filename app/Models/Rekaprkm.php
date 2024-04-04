<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekaprkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_rkm',
        'id_rekap_kinerja',
        'target_harian',
        'realisasi_harian',
        'biaya',
        'tanggal',
        'tahun',
        'satuan_hasil',
        'target_hasil',
        'realisasi_hasil',
        'kendala',
        'mitigasi',
        'photo_evident',
    ];
}
