@extends('layouts.app')

@section('title','Detail Riwayat Tanam')

@section('content')

<h1>
Batch {{ $batch->kode_batch }}
</h1>


<p>
Sayur :
{{ $batch->varietas->sayur->nama_sayur ?? '-' }}
</p>


<hr>


<h3>
Timeline Tanaman
</h3>


@foreach($riwayats as $riwayat)

<div style="margin-bottom:20px">

<h4>
🌱 {{ $riwayat->tanggal }}
</h4>

<p>
<b>Talang:</b>
{{ $riwayat->talang->kode_talang }}
</p>

<p>
<b>Fase:</b>
{{ $riwayat->talang->fase_tanaman ?? '-' }}
</p>

<p>
<b>Kegiatan:</b>
{{ $riwayat->kegiatan }}
</p>

<p>
<b>Jumlah:</b>
{{ $riwayat->jumlah_tanaman }}
tanaman
</p>

<p>
<b>Kondisi:</b>
{{ $riwayat->kondisi }}
</p>

</div>

<hr>

@endforeach


<a href="{{ route('riwayat-tanam.index') }}">
← Kembali
</a>


@endsection
