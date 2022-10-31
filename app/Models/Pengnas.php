<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengnas extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
        'scheme',
        'faculty',
        'study_program',
        'skill_group',
        'title_abdimas',
        'head',
        'fund',
        'society',
        'society_address',
        'city', 
        'society_scheme',
        'society_faculty',
    ];
}
