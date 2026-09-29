@extends('layouts.app')

@section('content')

<div class="container">

<h1>
🌱 Tambah Monitoring Tanaman
</h1>

<hr>

<p>
<b>Talang:</b>
{{ $talang->kode_talang }}
</p>

<p>
<b>Batch:</b>
{{ $riwayatTerakhir->batch->kode_batch }}
</p>


<form method="POST"
action="{{ route('monitoring.harian.store') }}">

@csrf


<input type="hidden"
name="id_talang"
value="{{ $talang->id_talang }}">


<input type="hidden"
name="id_batch"
value="{{ $riwayatTerakhir->id_batch }}">


<label>
Tanggal Monitoring
</label>

<input type="date"
name="tanggal_monitoring"
value="{{ date('Y-m-d') }}">


<br><br>


<label>
Jumlah Hidup
</label>

<input type="number"
name="jumlah_hidup">


<br><br>


<label>
Jumlah Mati
</label>

<input type="number"
name="jumlah_mati">

<br><br>

<hr>

<h3>
🌱 Perkembangan Tanaman
</h3>


<label>
Tinggi Tanaman (cm)
</label>

<input type="number"
step="0.01"
name="tinggi_tanaman"
placeholder="Contoh: 12.5">


<br><br>


<label>
Jumlah Daun
</label>

<input type="number"
name="jumlah_daun"
placeholder="Jumlah daun">


<br><br>


<hr>


<h3>
💧 Parameter Hidroponik
</h3>


<label>
pH Air
</label>

<input type="number"
step="0.01"
name="ph_air"
placeholder="Contoh: 6.2">


<br><br>


<label>
EC Air
</label>

<input type="number"
step="0.01"
name="ec_air"
placeholder="Contoh: 1.8">


<br><br>


<label>
Suhu Air (°C)
</label>

<input type="number"
step="0.01"
name="suhu_air"
placeholder="Contoh: 25.5">


<br><br>


<label>
Kondisi
</label>

<select name="kondisi">

<option value="normal">
Normal
</option>

<option value="perhatian">
Perhatian
</option>

<option value="bermasalah">
Bermasalah
</option>

</select>


<br><br>


<label>
Catatan
</label>

<textarea name="catatan"></textarea>


<br><br>


<button type="submit">
Simpan Monitoring
</button>


</form>

</div>

@endsection
