@extends('layouts.app')

@section('title','Edit Jenis Pelanggan')

@section('content')

<h1>Edit Jenis Pelanggan</h1>


<form
action="{{ route('jenis-pelanggan.update',$jenisPelanggan) }}"
method="POST"
>

@csrf
@method('PUT')


<div>

<label>
Jenis Pelanggan
</label>


<input
type="text"
name="jenis_pelanggan"
value="{{ $jenisPelanggan->jenis_pelanggan }}"
>


</div>


<br>


<button type="submit">
Update
</button>


</form>


@endsection@extends('layouts.app')

@section('title','Edit Jenis Pelanggan')

@section('content')

<h1>Edit Jenis Pelanggan</h1>


<form
action="{{ route('jenis-pelanggan.update',$jenisPelanggan) }}"
method="POST"
>

@csrf
@method('PUT')


<div>

<label>
Jenis Pelanggan
</label>


<input
type="text"
name="jenis_pelanggan"
value="{{ $jenisPelanggan->jenis_pelanggan }}"
>


</div>


<br>


<button type="submit">
Update
</button>


</form>


@endsection
