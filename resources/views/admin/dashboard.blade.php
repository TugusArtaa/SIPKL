@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>
    <div class="alert alert-success">
        Selamat datang, {{ auth()->user()->name }}! Anda login sebagai <strong>Admin</strong>.
    </div>
</div>
@endsection