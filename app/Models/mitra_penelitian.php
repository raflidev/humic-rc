<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mitra_penelitian extends Model
{
    use HasFactory;

    protected $table = "mitra_penelitian";

    protected $fillable = [
        "nama_mitra",
        "penelitian_id",
        "role"
    ];
}
