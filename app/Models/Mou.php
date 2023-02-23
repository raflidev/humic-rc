<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;

    protected $table = 'mou';

    protected $fillable = [
        'year',
        'faculty',
        'telu_number',
        'partner_number',
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
        'file',
        'activity_real',
    ];
}
