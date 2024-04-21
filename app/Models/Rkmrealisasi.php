<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rkmrealisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_rekap_rkm',
        'id_rkm',
        'id_p',
        'tanggal',
        'alamat',
        'daya',
        'satuan_hasil',
        'estimasi_hasil',
    ];
}
