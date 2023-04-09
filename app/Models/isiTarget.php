<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isiTarget extends Model
{
    use HasFactory;

    protected $table = "isi_target";

    protected $fillable = [
        "id_target",
        "id_subjek",
    ];
}
