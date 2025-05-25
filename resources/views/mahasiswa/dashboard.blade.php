@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Mahasiswa</h1>
    <div class="alert alert-primary">
        Halo, {{ auth()->user()->name }}! Anda login sebagai <strong>Mahasiswa</strong>.
    </div>
</div>
@endsection