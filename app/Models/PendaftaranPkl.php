<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Perusahaan;

class PendaftaranPkl extends Model
{
    protected $table = 'pendaftaran_pkl';

    protected $fillable = [
        'mahasiswa_id',
        'perusahaan_id',
        'bidang_pkl',
        'periode',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}