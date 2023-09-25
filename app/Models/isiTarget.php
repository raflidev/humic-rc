<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isiTarget extends Model
{
    use HasFactory;

    protected $table = "isi_target";

    protected $fillable = [
        "id_user",
        "id_target",
        "subjek",
        "fakultas",
        "prodi",
        "kelompok_keahlian",
        "skema",
        "total_bantuan",
        "id_subjek",
    ];
}
