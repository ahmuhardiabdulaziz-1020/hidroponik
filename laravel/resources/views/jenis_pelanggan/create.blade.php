@extends('layouts.app')

@section('title','Tambah Jenis Pelanggan')

@section('content')

<h1>Tambah Jenis Pelanggan</h1>


<form
action="{{ route('jenis-pelanggan.store') }}"
method="POST"
>

@csrf


<div>

<label>
Jenis Pelanggan
</label>

<input
type="text"
name="jenis_pelanggan"
>

</div>


<br>


<button type="submit">
Simpan
</button>


</form>


@endsection
