<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nko extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_unit_induk',
        'id_pelaksana',
        'id_layanan',
        'target_bulan',
        'realisasi_bulan',
        'target_tahun',
        'realisasi_tahun',
        'tahun',
    ];
}
