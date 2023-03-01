<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ntf extends Model
{
    use HasFactory;

    protected $table = 'ntf';

    protected $fillable = [
        'tahun',
        'dana',
    ];
}
