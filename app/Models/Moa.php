<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moa extends Model
{
    use HasFactory;

    protected $table = 'moa';

    protected $fillable = [
        'year',
        'faculty',
        'moa_number',
        'moa_number_partner',
        'title',
        'partner_name',
        'partner_type',
        'date_start',
        'date_end',
        'duration',
        'status_real',
        'status',
        'lndn',
        'pnp',
        'akd',
        'link',
        'activity_real',
    ];
}
