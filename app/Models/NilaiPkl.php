<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiPkl extends Model
{
    protected $table = 'nilai_pkl';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}