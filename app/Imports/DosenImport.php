<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class DosenImport implements OnEachRow, WithHeadingRow
{
    public $errors = [];
    public $fieldLabels = [
        'nama' => 'Nama',
        'nip' => 'NIP',
        'program_studi' => 'Program Studi',
        'email' => 'Email',
    ];
    public $ruleMessages = [
        'required' => 'Diperlukan',
        'email' => 'Format Salah',
        'string' => 'Harus berupa teks',
    ];
    public $fieldToColumn = [
        'nama' => 'A',
        'nip' => 'B',
        'program_studi' => 'C',
        'email' => 'D',
    ];

    public function onRow(Row $row)
    {
        $rowNum = $row->getIndex();
        $data = $row->toArray();
        $validator = Validator::make($data, [
            'nama' => 'required|string',
            'nip' => 'required|string',
            'program_studi' => 'required|string',
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
        if (Dosen::where('nip', $data['nip'])->exists()) {
            $this->errors[] = "Baris $rowNum, Kolom B: NIP sudah terdaftar (" . $data['nip'] . ")";
            return;
        }
        if (User::where('email', $data['email'])->exists()) {
            $this->errors[] = "Baris $rowNum, Kolom D: Email sudah terdaftar (" . $data['email'] . ")";
            return;
        }
        $user = User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['nip']),
            'role' => 'dosen',
        ]);
        Dosen::create([
            'user_id' => $user->id,
            'nama' => $data['nama'],
            'nip' => $data['nip'],
            'program_studi' => $data['program_studi'],
        ]);
    }
}