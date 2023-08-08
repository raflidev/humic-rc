<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_publikasi extends Model
{
    use HasFactory;

    protected $table = "member_publikasi";

    protected $fillable = [
        "user_id",
        "publikasi_id",
    ];
}
