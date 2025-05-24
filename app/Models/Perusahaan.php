<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LaporanPkl;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = ['nama', 'alamat', 'no_hp'];

    public function laporanPkl()
    {
        return $this->hasMany(LaporanPkl::class);
    }
}