<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    protected $table = 'target';

    protected $fillable = [
        "tahun",
        "sumber",
        "indikator",
        "target",
        "capaian",
        "keterangan",
    ];
}
