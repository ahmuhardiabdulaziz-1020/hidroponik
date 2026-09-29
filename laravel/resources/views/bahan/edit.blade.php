@extends('layouts.app')

@section('title','Edit Bahan')

@section('content')

<h1>Edit Bahan</h1>


<form
action="/bahan/{{ $bahan->id_bahan }}"
method="POST"
>

@csrf
@method('PUT')


<div>
<label>Kode Bahan</label>

<input
type="text"
name="kode_bahan"
value="{{ $bahan->kode_bahan }}"
>

</div>


<br>


<div>
<label>Nama Bahan</label>

<input
type="text"
name="nama_bahan"
value="{{ $bahan->nama_bahan }}"
>

</div>


<br>


<div>
<label>Jenis Bahan</label>

<select name="jenis_bahan">

<option value="benih"
{{ $bahan->jenis_bahan == 'benih' ? 'selected' : '' }}>
Benih
</option>


<option value="rockwool"
{{ $bahan->jenis_bahan == 'rockwool' ? 'selected' : '' }}>
Rockwool
</option>


<option value="nutrisi"
{{ $bahan->jenis_bahan == 'nutrisi' ? 'selected' : '' }}>
Nutrisi
</option>


<option value="disinfektan"
{{ $bahan->jenis_bahan == 'disinfektan' ? 'selected' : '' }}>
Disinfektan
</option>


<option value="lainnya"
{{ $bahan->jenis_bahan == 'lainnya' ? 'selected' : '' }}>
Lainnya
</option>


</select>

</div>


<br>


<div>
<label>Satuan Bahan</label>

<input
type="text"
name="satuan_bahan"
value="{{ $bahan->satuan_bahan }}"
>

</div>


<br>


<div>
<label>Stok</label>

<input
type="number"
step="0.01"
name="stok"
value="{{ $bahan->stok }}"
>

</div>


<br>


<div>
<label>Stok Minimum</label>

<input
type="number"
step="0.01"
name="stok_minimum"
value="{{ $bahan->stok_minimum }}"
>

</div>


<br>


<button type="submit">
Update
</button>


</form>


@endsection
