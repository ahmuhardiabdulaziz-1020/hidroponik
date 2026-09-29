@extends('layouts.app')

@section('title','Jenis Pelanggan')

@section('content')

<h1>Jenis Pelanggan</h1>


<a href="{{ route('jenis-pelanggan.create') }}">
    + Tambah Jenis Pelanggan
</a>


<br><br>


<table border="1" cellpadding="10" width="100%">

<tr>
    <th>No</th>
    <th>Jenis Pelanggan</th>
    <th>Aksi</th>
</tr>


@foreach($jenisPelanggans as $jenis)

<tr>

<td>
{{ $loop->iteration }}
</td>


<td>
{{ $jenis->jenis_pelanggan }}
</td>


<td>

<a href="{{ route('jenis-pelanggan.edit',$jenis) }}">
Edit
</a>


<form
action="{{ route('jenis-pelanggan.destroy',$jenis) }}"
method="POST"
style="display:inline"
>

@csrf
@method('DELETE')


<button type="submit">
Hapus
</button>


</form>


</td>

</tr>


@endforeach


</table>


@endsection
