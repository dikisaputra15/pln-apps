<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikatorkinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_unit_induk',
        'id_pelaksana',
        'id_layanan',
        'aspirasi',
        'indikator_kinerja',
        'id_kategori',
        'id_satuan',
        'bobot',
        'polaritas',
    ];
}
