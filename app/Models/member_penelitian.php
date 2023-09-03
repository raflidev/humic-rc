<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_penelitian extends Model
{
    use HasFactory;

    protected $table = "member_penelitian";

    protected $fillable = [
        "user_id",
        "penelitian_id",
        "role",
    ];
}
