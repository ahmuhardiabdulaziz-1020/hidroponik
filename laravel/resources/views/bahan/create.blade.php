@extends('layouts.app')

@section('title','Tambah Bahan')

@section('content')

<h1>Tambah Bahan</h1>


<form
action="{{ route('bahan.store') }}"
method="POST"
>

@csrf


<div>
<label>Kode Bahan</label>

<input
type="text"
name="kode_bahan"
>

</div>


<br>


<div>
<label>Nama Bahan</label>

<input
type="text"
name="nama_bahan"
>

</div>


<br>


<div>
<label>Jenis Bahan</label>

<select name="jenis_bahan">

<option value="">
-- Pilih Jenis --
</option>

<option value="benih">
Benih
</option>

<option value="rockwool">
Rockwool
</option>

<option value="nutrisi">
Nutrisi
</option>

<option value="disinfektan">
Disinfektan
</option>

<option value="lainnya">
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
>

</div>


<br>


<div>
<label>Stok</label>

<input
type="number"
step="0.01"
name="stok"
value="0"
>

</div>


<br>


<div>
<label>Stok Minimum</label>

<input
type="number"
step="0.01"
name="stok_minimum"
value="0"
>

</div>


<br>


<button type="submit">
Simpan
</button>


</form>


@endsection
