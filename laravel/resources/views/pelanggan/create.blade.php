@extends('layouts.app')

@section('title','Tambah Pelanggan')

@section('content')

<h1>Tambah Pelanggan</h1>


<form
action="{{ route('pelanggan.store') }}"
method="POST"
>

@csrf


<div>

<label>
Jenis Pelanggan
</label>


<select name="id_jenpelanggan">

<option value="">
-- Pilih Jenis --
</option>


@foreach($jenisPelanggans as $jenis)

<option value="{{ $jenis->id_jenpelanggan }}">
{{ $jenis->jenis_pelanggan }}
</option>

@endforeach


</select>

</div>


<br>


<div>

<label>
Nama Pelanggan
</label>


<input
type="text"
name="nama_pelanggan"
>

</div>


<br>


<div>

<label>
No HP
</label>


<input
type="text"
name="no_hp"
>

</div>


<br>


<div>

<label>
Alamat
</label>


<textarea name="alamat"></textarea>

</div>


<br>


<button type="submit">
Simpan
</button>


</form>


@endsection
