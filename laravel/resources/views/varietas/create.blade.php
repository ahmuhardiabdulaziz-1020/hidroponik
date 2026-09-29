@extends('layouts.app')

@section('title','Tambah Varietas')

@section('content')

<h1>Tambah Varietas</h1>

<form action="{{ route('varietas.store') }}" method="POST">

@csrf


<div>
<label>Sayur</label>

<select name="id_sayur">

<option value="">
-- Pilih Sayur --
</option>

@foreach($sayurs as $sayur)

<option value="{{ $sayur->id_sayur }}">
{{ $sayur->nama_sayur }}
</option>

@endforeach

</select>

</div>


<br>


<div>
<label>Nama Varietas</label>

<input 
type="text"
name="nama_varietas"
>

</div>


<br>


<div>
<label>Estimasi Bobot</label>

<input 
type="number"
name="est_bobot"
>

</div>


<br>


<div>
<label>Satuan</label>

<input 
type="text"
name="satuan_bobot"
value="gram"
>

</div>


<br>


<button type="submit">
Simpan
</button>


</form>


@endsection
