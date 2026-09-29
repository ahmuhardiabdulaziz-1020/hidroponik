@extends('layouts.app')

@section('title','Master Data Talang')

@section('content')

<h1>Master Data Talang</h1>


<a href="{{ route('talang.create') }}">
    + Tambah Talang
</a>


<br><br>


<table border="1" cellpadding="10" width="100%">

<tr>
    <th>Kode Talang</th>
    <th>Tipe Talang</th>
    <th>Fase Tanaman</th>
    <th>Kapasitas</th>
    <th>Keterangan</th>
    <th>Aksi</th>
</tr>


@foreach($talangs as $talang)

<tr>

<td>
{{ $talang->kode_talang }}
</td>


<td>
{{ $talang->tipe_talang }}
</td>


<td>
{{ $talang->fase_tanaman ?? '-' }}
</td>


<td>
{{ $talang->kapasitas }} lubang
</td>


<td>
{{ $talang->keterangan ?? '-' }}
</td>


<td>

<a href="{{ route('talang.edit',$talang) }}">
Edit
</a>


<form
action="{{ route('talang.destroy',$talang) }}"
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
