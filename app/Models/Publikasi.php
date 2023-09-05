<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $table = "publikasi";

    protected $fillable = [
        "jenis_publikasi",
        "judul",
        "nama_jurnal",
        "issue",
        "volume",
        "tahun",
        "quartile",
        "indexed",
        "link_makalah",
        "status",
    ];
}
