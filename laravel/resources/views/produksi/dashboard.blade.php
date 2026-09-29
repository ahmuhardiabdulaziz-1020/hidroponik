@extends('layouts.app')

@section('title', 'Dashboard Operator Produksi')

@section('content')

<h1>Dashboard Operator Produksi</h1>

<p>
    Halo {{ auth()->user()->name }}
</p>

<p>
    Role: {{ auth()->user()->userRole->nama_role }}
</p>

@endsection
