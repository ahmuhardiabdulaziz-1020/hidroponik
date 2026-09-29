@extends('layouts.app')

@section('title','Edit Pelanggan')

@section('content')

<h1>Edit Pelanggan</h1>


<form
action="{{ route('pelanggan.update',$pelanggan) }}"
method="POST"
>

@csrf
@method('PUT')


<div>

<label>
Jenis Pelanggan
</label>


<select name="id_jenpelanggan">


@foreach($jenisPelanggans as $jenis)

<option
value="{{ $jenis->id_jenpelanggan }}"
{{ $pelanggan->id_jenpelanggan == $jenis->id_jenpelanggan ? 'selected' : '' }}
>

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
value="{{ $pelanggan->nama_pelanggan }}"
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
value="{{ $pelanggan->no_hp }}"
>

</div>


<br>


<div>

<label>
Alamat
</label>


<textarea name="alamat">{{ $pelanggan->alamat }}</textarea>


</div>


<br>


<button type="submit">
Update
</button>


</form>


@endsection
