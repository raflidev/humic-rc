<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mitra_publikasi extends Model
{
    use HasFactory;

    protected $table = "mitra_publikasi";

    protected $fillable = [
        "nama_mitra",
        "publikasi_id",
        "role"
    ];
}
