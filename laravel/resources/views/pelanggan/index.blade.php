@extends('layouts.app')

@section('title','Pelanggan')

@section('content')

<h1>Data Pelanggan</h1>


<a href="{{ route('pelanggan.create') }}">
    + Tambah Pelanggan
</a>


<br><br>


<table border="1" cellpadding="10" width="100%">

<tr>
    <th>No</th>
    <th>Jenis Pelanggan</th>
    <th>Nama Pelanggan</th>
    <th>No HP</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>


@foreach($pelanggans as $pelanggan)

<tr>

<td>
{{ $loop->iteration }}
</td>


<td>
{{ $pelanggan->jenisPelanggan->jenis_pelanggan ?? '-' }}
</td>


<td>
{{ $pelanggan->nama_pelanggan }}
</td>


<td>
{{ $pelanggan->no_hp ?? '-' }}
</td>


<td>
{{ $pelanggan->alamat ?? '-' }}
</td>


<td>

<a href="{{ route('pelanggan.edit',$pelanggan) }}">
Edit
</a>


<form
action="{{ route('pelanggan.destroy',$pelanggan) }}"
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
