<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class MahasiswaImport implements OnEachRow, WithHeadingRow
{
    use Importable;
    public $errors = [];
    public $fieldLabels = [
        'nama' => 'Nama',
        'nim' => 'NIM',
        'program_studi' => 'Program Studi',
        'kelas' => 'Kelas',
        'semester' => 'Semester',
        'email' => 'Email',
    ];
    public $ruleMessages = [
        'required' => 'Diperlukan',
        'email' => 'Format Salah',
        'string' => 'Harus berupa teks',
        'integer' => 'Harus berupa angka',
    ];
    public $fieldToColumn = [
        'nama' => 'A',
        'nim' => 'B',
        'program_studi' => 'C',
        'kelas' => 'D',
        'semester' => 'E',
        'email' => 'F',
    ];

    public function onRow(Row $row)
    {
        $rowNum = $row->getIndex();
        $data = $row->toArray();
        $validator = Validator::make($data, [
            'nama' => 'required|string',
            'nim' => 'required|string',
            'program_studi' => 'required|string',
            'kelas' => 'required|string',
            'semester' => 'required|integer',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            foreach ($validator->failed() as $field => $failRules) {
                foreach ($failRules as $rule => $failDetail) {
                    $fieldLabel = $this->fieldLabels[$field] ?? $field;
                    $ruleMsg = $this->ruleMessages[strtolower($rule)] ?? $rule;
                    $col = $this->fieldToColumn[$field] ?? $field;
                    $this->errors[] = "Baris $rowNum, Kolom $col: validation.$rule ($fieldLabel $ruleMsg)";
                }
            }
            return;
        }

        // Cek duplikat NIM
        if (Mahasiswa::where('nim', $data['nim'])->exists()) {
            $this->errors[] = "Baris $rowNum, Kolom B: NIM sudah terdaftar (" . $data['nim'] . ")";
            return;
        }

        // Cek duplikat email
        if (User::where('email', $data['email'])->exists()) {
            $this->errors[] = "Baris $rowNum, Kolom F: Email sudah terdaftar (" . $data['email'] . ")";
            return;
        }

        $user = User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['nim']),
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nama' => $data['nama'],
            'nim' => $data['nim'],
            'program_studi' => $data['program_studi'],
            'kelas' => $data['kelas'],
            'semester' => $data['semester'],
        ]);
    }
}