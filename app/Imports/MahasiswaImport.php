<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Model;

class MahasiswaImport implements ToModel
{
    public function model(array $row): ?Model
    {
        if ($row[0] === 'nama' || empty($row[0]))
            return null;

        // Cek duplikat NIM
        if (Mahasiswa::where('nim', $row[1])->exists())
            return null;

        $user = User::create([
            'name' => $row[0],
            'email' => $row[5],
            'password' => Hash::make($row[1]),
            'role' => 'mahasiswa',
        ]);

        return new Mahasiswa([
            'user_id' => $user->id,
            'nama' => $row[0],
            'nim' => $row[1],
            'program_studi' => $row[2],
            'kelas' => $row[3],
            'semester' => $row[4],
        ]);
    }
}