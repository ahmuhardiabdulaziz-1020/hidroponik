@extends('layouts.app')

@section('title','Tambah Talang')

@section('content')

<h1>Tambah Talang</h1>


<form
action="{{ route('talang.store') }}"
method="POST"
>

@csrf


<div>
<label>Kode Talang</label>

<input
type="text"
name="kode_talang"
>

</div>


<br>


<div>
<label>Tipe Talang</label>

<input
type="text"
name="tipe_talang"
>

</div>


<br>


<div>
<label>Fase Tanaman</label>

<input
type="text"
name="fase_tanaman"
>

</div>


<br>


<div>
<label>Kapasitas</label>

<input
type="number"
name="kapasitas"
>

</div>


<br>


<div>
<label>Keterangan</label>

<textarea
name="keterangan">
</textarea>

</div>


<br>


<button type="submit">
Simpan
</button>


</form>


@endsection
