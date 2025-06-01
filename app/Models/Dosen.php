<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = ['user_id', 'nama', 'nip', 'program_studi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function nilaiPkl()
    {
        return $this->hasMany(NilaiPkl::class);
    }

}