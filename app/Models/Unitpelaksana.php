<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitpelaksana extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_unit_induk',
        'nama_unit_pelaksana',
    ];
}
