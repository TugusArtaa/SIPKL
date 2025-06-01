<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bimbingan;
use App\Models\LaporanPkl;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'program_studi',
        'kelas',
        'semester',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laporanPkl()
    {
        return $this->hasMany(LaporanPkl::class);
    }

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function pendaftaranPkl()
    {
        return $this->hasOne(PendaftaranPkl::class);
    }

    public function nilaiPkl()
    {
        return $this->hasOne(NilaiPkl::class);
    }
}