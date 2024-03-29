<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hki extends Model
{
    use HasFactory;

    protected $table = 'hki';

    protected $fillable = [
        'tahun',
        'judul',
        'member',
        'partner',
        'jenis',
        'status',
        'status_post',
    ];
}
