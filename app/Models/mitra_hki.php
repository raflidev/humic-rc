<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mitra_hki extends Model
{
    use HasFactory;

    protected $table = "mitra_hki";

    protected $fillable = [
        "nama_mitra",
        "hki_id",
        "role"
    ];
}
