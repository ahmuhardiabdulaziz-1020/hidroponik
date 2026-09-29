@extends('layouts.app')

@section('title','Master Data Varietas')

@section('content')

<h1>Master Data Varietas</h1>

<a href="{{ route('varietas.create') }}">
    + Tambah Varietas
</a>

<br><br>

<table border="1" cellpadding="10" width="100%">

<tr>
    <th>Sayur</th>
    <th>Nama Varietas</th>
    <th>Estimasi Bobot</th>
    <th>Satuan</th>
    <th>Aksi</th>
</tr>


@foreach($varietas as $item)
<tr>

<td>
    {{ $item->sayur->nama_sayur ?? '-' }}
</td>

<td>
    {{ $item->nama_varietas }}
</td>

<td>
    {{ $item->est_bobot }}
</td>

<td>
    {{ $item->satuan_bobot }}
</td>
<td>

<a href="{{ route('varietas.edit', $item) }}">
    Edit
</a>


<form 
action="{{ route('varietas.destroy', $item) }}"
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
