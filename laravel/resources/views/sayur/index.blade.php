@extends('layouts.app')

@section('title', 'Master Data Sayur')

@section('content')

<h1>Master Data Sayur</h1>

<a href="{{ route('sayur.create') }}">
    + Tambah Sayur
</a>

<br><br>

<table border="1" cellpadding="10" width="100%">

<tr>
    <th>Kode Sayur</th>
    <th>Nama Sayur</th>
    <th>Durasi Semai</th>
    <th>Durasi Remaja</th>
    <th>Durasi Panen</th>
    <th>Aksi</th>
</tr>


@foreach($sayurs as $sayur)

<tr>
    <td>{{ $sayur->kode_sayur }}</td>
    <td>{{ $sayur->nama_sayur }}</td>
    <td>{{ $sayur->durasi_semai }} hari</td>
    <td>{{ $sayur->durasi_remaja }} hari</td>
    <td>{{ $sayur->durasi_panen }} hari</td>
    <td>

<a href="{{ route('sayur.edit', $sayur) }}">
    Edit
</a>


<form
action="{{ route('sayur.destroy', $sayur) }}"
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
