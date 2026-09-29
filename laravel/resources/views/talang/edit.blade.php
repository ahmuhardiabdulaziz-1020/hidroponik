@extends('layouts.app')

@section('title','Edit Talang')

@section('content')

<h1>Edit Talang</h1>


<form
action="/talang/{{ $talang->id_talang }}"
method="POST"
>

@csrf
@method('PUT')


<div>
<label>Kode Talang</label>

<input
type="text"
name="kode_talang"
value="{{ $talang->kode_talang }}"
>

</div>


<br>


<div>
<label>Tipe Talang</label>

<input
type="text"
name="tipe_talang"
value="{{ $talang->tipe_talang }}"
>

</div>


<br>


<div>
<label>Fase Tanaman</label>

<input
type="text"
name="fase_tanaman"
value="{{ $talang->fase_tanaman }}"
>

</div>


<br>


<div>
<label>Kapasitas</label>

<input
type="number"
name="kapasitas"
value="{{ $talang->kapasitas }}"
>

</div>


<br>


<div>
<label>Keterangan</label>

<textarea name="keterangan">{{ $talang->keterangan }}</textarea>

</div>


<br>


<button type="submit">
Update
</button>


</form>


@endsection
