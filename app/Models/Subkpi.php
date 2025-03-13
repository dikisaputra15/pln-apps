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

}
