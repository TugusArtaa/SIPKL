<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormatLaporan extends Model
{
    protected $table = 'format_laporan';

    protected $fillable = [
        'nama',
        'file',
    ];
}