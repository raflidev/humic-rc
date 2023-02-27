<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengnas extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
        'user_id',
        'scheme',
        'faculty',
        'study_program',
        'skill_group',
        'title_abdimas',
        'lecturer',
        'lecturer_total',
        'student',
        'student_total',
        'head',
        'fund',
        'society',
        'society_address',
        'city',
        'society_scheme',
        'society_faculty',
        'status',
        'fund_scheme',
        'fund_type'
    ];
}
