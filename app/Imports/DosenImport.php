<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Model;

class DosenImport implements ToModel
{
    public function model(array $row): ?Model
    {
        if ($row[0] === 'nama')
            return null;

        // Cek duplikat NIP
        if (Dosen::where('nip', $row[1])->exists())
            return null;

        $user = User::create([
            'name' => $row[0],
            'email' => $row[3],
            'password' => Hash::make($row[1]),
            'role' => 'dosen',
        ]);

        return new Dosen([
            'user_id' => $user->id,
            'nama' => $row[0],
            'nip' => $row[1],
            'program_studi' => $row[2],
        ]);
    }
}