<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rkmdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_rkm_realisasi', // Tambahkan kolom ini
        'id_pel',
        'uraian_nama',
        'kontribusi',
        'tanggal',
    ];
}
