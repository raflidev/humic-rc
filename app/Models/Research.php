<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty',
        'user_id',
        'study_program',
        'research_title',
        'skill_group',
        'head_name',
        'head_partner_name',
        'fund_external',
        'member',
        'student',
        'member_partner',
        'fund_total',
        'research_type',
        'year',
        'fund_type',
        'group_society',
        'fund_group_society',
        'brim',
        'fund_brim',
        'date_start',
        'date_end',
        'contract_number',
        'description',
        'status',
    ];
}
