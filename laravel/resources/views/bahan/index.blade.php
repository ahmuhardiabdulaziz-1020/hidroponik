@extends('layouts.app')

@section('title','Master Data Bahan')

@section('content')

<h1>Master Data Bahan</h1>


<a href="{{ route('bahan.create') }}">
    + Tambah Bahan
</a>


<br><br>


<table border="1" cellpadding="10" width="100%">

<tr>
    <th>Kode Bahan</th>
    <th>Nama Bahan</th>
    <th>Jenis</th>
    <th>Satuan</th>
    <th>Stok</th>
    <th>Stok Minimum</th>
    <th>Aksi</th>
</tr>


@foreach($bahans as $bahan)

<tr>

<td>
{{ $bahan->kode_bahan }}
</td>


<td>
{{ $bahan->nama_bahan }}
</td>


<td>
{{ $bahan->jenis_bahan }}
</td>


<td>
{{ $bahan->satuan_bahan }}
</td>


<td>
{{ $bahan->stok }}
</td>


<td>
{{ $bahan->stok_minimum }}
</td>


<td>

<a href="{{ route('bahan.edit',$bahan) }}">
Edit
</a>


<form
action="{{ route('bahan.destroy',$bahan) }}"
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
