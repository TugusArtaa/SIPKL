@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Dosen</h1>
    <div class="alert alert-info">
        Selamat datang, {{ auth()->user()->name }}! Anda login sebagai <strong>Dosen</strong>.
    </div>
</div>
@endsection