@extends('layouts.app')

@section('title','Riwayat Tanam')

@section('content')

<h1>Riwayat Tanam</h1>


<a href="{{ route('riwayat-tanam.create') }}">
    + Tambah Riwayat
</a>


<br><br>


<table border="1" cellpadding="10" width="100%">

<tr>
    <th>No</th>
    <th>Batch</th>
    <th>Sayur</th>
    <th>Talang</th>
    <th>Fase</th>
    <th>Tanggal</th>
    <th>Kegiatan</th>
    <th>Jumlah</th>
    <th>Kondisi</th>
    <th>Aksi</th>
</tr>


@foreach($riwayatTanams as $riwayat)

<tr>

<td>
{{ $loop->iteration }}
</td>


<td>
{{ $riwayat->batch->kode_batch }}
</td>


<td>
{{ $riwayat->batch->varietas->sayur->nama_sayur ?? '-' }}
</td>


<td>
{{ $riwayat->talang->kode_talang }}
</td>

<td>
{{ $riwayat->talang->fase_tanaman ?? '-' }}
</td>

<td>
{{ $riwayat->tanggal }}
</td>


<td>
{{ $riwayat->kegiatan }}
</td>


<td>
{{ $riwayat->jumlah_tanaman }}
</td>


<td>
{{ $riwayat->kondisi }}
</td>


<td>

<a href="{{ route('riwayat-tanam.show',$riwayat->batch) }}">
Detail
</a>

<a href="{{ route('riwayat-tanam.edit',$riwayat) }}">
Edit
</a>


<form
action="{{ route('riwayat-tanam.destroy',$riwayat) }}"
method="POST"
style="display:inline"
>

@csrf
@method('DELETE')


<button>
Hapus
</button>


</form>

</td>

</tr>


@endforeach


</table>


@endsection
