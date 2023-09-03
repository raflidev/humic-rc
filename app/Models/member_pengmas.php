<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_pengmas extends Model
{
    use HasFactory;

    protected $table = "member_pengmas";

    protected $fillable = [
        "user_id",
        "pengmas_id",
        "role",
    ];
}
