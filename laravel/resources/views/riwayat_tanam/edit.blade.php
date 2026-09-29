@extends('layouts.app')

@section('title','Edit Riwayat Tanam')

@section('content')

<h1>Edit Riwayat Tanam</h1>


<form
action="{{ route('riwayat-tanam.update',$riwayatTanam) }}"
method="POST"
>

@csrf
@method('PUT')


<label>
Batch Tanam
</label>

<br>

<select name="id_batch" required>

@foreach($batchTanams as $batch)

<option
value="{{ $batch->id_batch }}"
{{ 
$riwayatTanam->id_batch == $batch->id_batch 
? 'selected' 
: '' 
}}
>

{{ $batch->kode_batch }}
-
{{ $batch->varietas->sayur->nama_sayur ?? '-' }}

</option>

@endforeach

</select>


<br><br>


<label>
Talang
</label>

<br>

<select name="id_talang" required>


@foreach($talangs as $talang)

<option
value="{{ $talang->id_talang }}"
{{
$riwayatTanam->id_talang == $talang->id_talang
? 'selected'
: ''
}}
>

{{ $talang->kode_talang }}
-
{{ $talang->fase_tanaman }}

</option>

@endforeach


</select>


<br><br>


<label>
Tanggal
</label>

<br>

<input
type="date"
name="tanggal"
value="{{ $riwayatTanam->tanggal }}"
required
>


<br><br>


<label>
Kegiatan
</label>

<br>

<input
type="text"
name="kegiatan"
value="{{ $riwayatTanam->kegiatan }}"
required
>


<br><br>


<label>
Jumlah Tanaman
</label>

<br>

<input
type="number"
name="jumlah_tanaman"
value="{{ $riwayatTanam->jumlah_tanaman }}"
required
>


<br><br>


<label>
Kondisi
</label>

<br>

<input
type="text"
name="kondisi"
value="{{ $riwayatTanam->kondisi }}"
required
>


<br><br>


<label>
Keterangan
</label>

<br>

<textarea name="keterangan">{{ $riwayatTanam->keterangan }}</textarea>


<br><br>


<button type="submit">
Update
</button>


<a href="{{ route('riwayat-tanam.index') }}">
Kembali
</a>


</form>


@endsection
