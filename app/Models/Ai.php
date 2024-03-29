<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ai extends Model
{
    use HasFactory;

    protected $table = 'ai';

    protected $fillable = [
        'user_id',
        "year",
        "faculty",
        "telu_number",
        "title",
        "partner_number",
        "partner_name",
        "partner_type",
        "date",
        'status_real',
        "status",
        "lndn",
        "link",
        "activity_real",
    ];
}
