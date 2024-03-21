<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Real extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_laporan',
        'up3',
        'ulp',
        'id_pelanggan',
    ];
}
