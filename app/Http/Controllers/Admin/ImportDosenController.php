<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportDosenRequest;
use App\Imports\DosenImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportDosenController extends Controller
{
    public function create()
    {
        return view('admin.dosen.import');
    }

    public function store(ImportDosenRequest $request)
    {
        Excel::import(new DosenImport, $request->file('file'));

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }
}