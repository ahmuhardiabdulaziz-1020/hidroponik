@extends('layouts.app')

@section('title','Tambah Riwayat Tanam')

@section('content')

<h1>Tambah Riwayat Tanam</h1>


<form
action="{{ route('riwayat-tanam.store') }}"
method="POST"
>

@csrf


<label>
Batch Tanam
</label>

<br>

<select name="id_batch">

<option>
-- Pilih Batch --
</option>

@foreach($batchTanams as $batch)

<option value="{{ $batch->id_batch }}">

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


<select name="id_talang">

<option>
-- Pilih Talang --
</option>


@foreach($talangs as $talang)

<option value="{{ $talang->id_talang }}">

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
>


<br><br>


<label>
Kegiatan
</label>

<br>

<input
type="text"
name="kegiatan"
placeholder="Contoh: Penyemaian / Pindah Tanam"
>


<br><br>


<label>
Jumlah Tanaman
</label>

<br>

<input
type="number"
name="jumlah_tanaman"
>


<br><br>


<label>
Kondisi
</label>

<br>

<input
type="text"
name="kondisi"
placeholder="Contoh: Baik"
>


<br><br>


<label>
Keterangan
</label>

<br>

<textarea name="keterangan"></textarea>


<br><br>


<button>
Simpan
</button>


</form>


@endsection
