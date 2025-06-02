<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportMahasiswaRequest;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportMahasiswaController extends Controller
{
    public function create()
    {
        return view('admin.mahasiswa.import');
    }

    public function store(ImportMahasiswaRequest $request)
    {
        $import = new MahasiswaImport;
        Excel::import($import, $request->file('file'));

        if (!empty($import->errors)) {
            return redirect()->back()->withErrors(['import' => $import->errors])->withInput();
        }

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
}