<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mitra_pengmas extends Model
{
    use HasFactory;

    protected $table = "mitra_pengmas";

    protected $fillable = [
        "nama_mitra",
        "pengmas_id",
        "role"
    ];
}
