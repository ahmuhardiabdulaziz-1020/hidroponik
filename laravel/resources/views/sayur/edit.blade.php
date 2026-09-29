@extends('layouts.app')

@section('title','Edit Sayur')

@section('content')

<h1>Edit Sayur</h1>


<form
action="/sayur/{{ $sayur->id_sayur }}"
method="POST"
>

@csrf
@method('PUT')


<div>
<label>Kode Sayur</label>

<input
type="text"
name="kode_sayur"
value="{{ $sayur->kode_sayur }}"
>

</div>

<br>


<div>
<label>Nama Sayur</label>

<input
type="text"
name="nama_sayur"
value="{{ $sayur->nama_sayur }}"
>

</div>

<br>


<div>
<label>Durasi Semai</label>

<input
type="number"
name="durasi_semai"
value="{{ $sayur->durasi_semai }}"
>

</div>

<br>


<div>
<label>Durasi Remaja</label>

<input
type="number"
name="durasi_remaja"
value="{{ $sayur->durasi_remaja }}"
>

</div>

<br>


<div>
<label>Durasi Panen</label>

<input
type="number"
name="durasi_panen"
value="{{ $sayur->durasi_panen }}"
>

</div>

<br>


<button type="submit">
Update
</button>


</form>


@endsection
