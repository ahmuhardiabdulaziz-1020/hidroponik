@extends('layouts.app')

@section('title','Tambah Sayur')

@section('content')

<h1>Tambah Sayur</h1>


<form
action="{{ route('sayur.store') }}"
method="POST"
>

@csrf


<div>
<label>Kode Sayur</label>

<input
type="text"
name="kode_sayur"
>
</div>

<br>


<div>
<label>Nama Sayur</label>

<input
type="text"
name="nama_sayur"
>
</div>

<br>


<div>
<label>Durasi Semai</label>

<input
type="number"
name="durasi_semai"
>
</div>

<br>


<div>
<label>Durasi Remaja</label>

<input
type="number"
name="durasi_remaja"
>
</div>

<br>


<div>
<label>Durasi Panen</label>

<input
type="number"
name="durasi_panen"
>
</div>


<br>


<button type="submit">
Simpan
</button>


</form>


@endsection

