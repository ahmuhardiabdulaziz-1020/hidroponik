<!DOCTYPE html>
<html>
<head>
<title>Monitoring Tanaman</title>

<style>

body {
    font-family: Arial, sans-serif;
    background:#f5f7f8;
    padding:30px;
}


h1 {
    margin-bottom:30px;
}


.summary {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-bottom:30px;
}


.summary-card {

    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);

}


.summary-card h3 {
    margin:0;
    color:#777;
    font-size:14px;
}


.summary-card p {

    font-size:32px;
    font-weight:bold;
    margin:10px 0 0;

}



.card {

    background:white;
    padding:25px;
    margin-bottom:25px;
    border-radius:18px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);

}



.header {

    display:flex;
    justify-content:space-between;
    align-items:center;

}


.batch {

    font-size:28px;
    font-weight:bold;

}



.status {

    padding:8px 15px;
    border-radius:20px;
    display:inline-block;

}


.success {

    background:#dff5df;
    color:#277a27;

}


.warning {

    background:#fff3cd;
    color:#856404;

}


.danger {

    background:#f8d7da;
    color:#842029;

}


.secondary {

    background:#e2e3e5;
    color:#41464b;

}



.info {

    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:15px;
    margin-top:20px;

}


.item {

    background:#f8f8f8;
    padding:15px;
    border-radius:10px;

}

.timeline-item {

    border-left:4px solid #4caf50;
    padding-left:20px;
    margin-bottom:15px;

}

.progress {

    background:#ddd;
    height:15px;
    border-radius:20px;
    overflow:hidden;

}


.progress-bar {

    height:100%;
    background:#4caf50;

}

.lifecycle {

    margin-top:20px;

}


.phase {

    margin-bottom:15px;

}


.bar {

    height:18px;
    background:#eee;
    border-radius:10px;
    overflow:hidden;

}


.fill {

    height:100%;

}


.semai {

    width:20%;

    background:#81c784;

}


.remaja {

    width:45%;

    background:#4caf50;

}


.panen {

    width:35%;

    background:#2196f3;

}


.marker-info {

    margin-top:20px;
    font-weight:bold;

}

.marker-info {

    margin-top:20px;
    font-weight:bold;

}

</style>

</head>


<body>


<h1>
🌱 Monitoring Tanaman
</h1>



<div class="summary">


<div class="summary-card">
<h3>Total Batch Aktif</h3>
<p>
{{ $summary['total_batch'] }}
</p>
</div>


<div class="summary-card">
<h3>Total Tanaman Aktif</h3>
<p>
{{ $summary['total_tanaman'] }}
</p>
</div>


<div class="summary-card">
<h3>Panen Terdekat</h3>
<p>
{{ $summary['akan_panen'] }} hari
</p>
</div>


</div>





@forelse($monitoring as $item)


<div class="card">


<div class="header">

<div class="batch">

{{ $item['kode_batch'] }}

</div>


<span class="status {{ $item['status_level'] }}">

{{ $item['status_label'] }}

</span>


</div>



<h2>

{{ $item['nama_sayur'] }}

</h2>


<p>

Varietas:
<b>
{{ $item['nama_varietas'] }}
</b>

</p>



<div class="info">


<div class="item">

<b>Lokasi</b>

<br>

{{ $item['kode_talang'] }}

<br>

{{ $item['tipe_talang'] }}

</div>



<div class="item">

<b>Jumlah Tanaman</b>

<br>

{{ $item['jumlah_aktual'] }}

/
{{ $item['jumlah_tanam'] }}

</div>



<div class="item">

<b>Umur Tanaman</b>

<br>

{{ $item['umur_hari'] }} hari

</div>



<div class="item">

<b>Prediksi Panen</b>

<br>

{{ $item['tanggal_prediksi_panen'] }}

<br>

Sisa {{ $item['sisa_hari_panen'] }} hari

</div>


</div>



<br>


<b>Progress Lifecycle</b>


<div class="progress">

    <div class="progress-bar"
    style="width: {{ $item['progress'] }}%">
    </div>

</div>


<br>

<h3>
Lifecycle Tanaman
</h3>


<div class="lifecycle">


<div class="phase">

<span>
Semai
</span>

<div class="bar">

<div class="fill semai"></div>

</div>

<small>
0 -
{{ $item['lifecycle']['semai']['akhir'] }}
hari
</small>

</div>



<div class="phase">

<span>
Remaja
</span>

<div class="bar">

<div class="fill remaja"></div>

</div>

<small>
{{ $item['lifecycle']['remaja']['mulai'] }}
-
{{ $item['lifecycle']['remaja']['akhir'] }}
hari
</small>

</div>



<div class="phase">

<span>
Panen
</span>

<div class="bar">

<div class="fill panen"></div>

</div>

<small>
{{ $item['lifecycle']['panen']['mulai'] }}
-
{{ $item['lifecycle']['panen']['akhir'] }}
hari
</small>

</div>


</div>


<div class="lifecycle-wrapper">


<div class="lifecycle-line">


<div class="lifecycle-progress"

style="
width: {{ $item['progress'] }}%
">

</div>


<div class="lifecycle-marker"

style="
left: {{ $item['progress'] }}%
">

<div class="marker-arrow">
▲
</div>


Hari ke {{ $item['umur_hari'] }}

<br>

{{ $item['progress'] }}%

</div>


</div>


</div>
</div>


<p>

{{ $item['progress'] }}%

</p>




<div class="info">


<div class="item">

<b>Fase Prediksi</b>

<br>

{{ $item['prediksi_fase'] }}

</div>



<div class="item">

<b>Fase Aktual</b>

<br>

{{ $item['fase_aktual'] ?? '-' }}

</div>


</div>

<br>

<h3>
Riwayat Tanaman
</h3>


@foreach($item['riwayat'] as $riwayat)

<div class="item timeline-item">

<b>
{{ $riwayat->tanggal }}
</b>

<br><br>

<strong>
{{ $riwayat->kegiatan }}
</strong>

<br><br>

Jumlah:
{{ $riwayat->jumlah_tanaman }}

tanaman

<br>

Kondisi:
{{ $riwayat->kondisi }}


@if($riwayat->talang)

<br>

Lokasi:

{{ $riwayat->talang->kode_talang }}
-
{{ $riwayat->talang->tipe_talang }}

@endif


@if($riwayat->keterangan)

<br><br>

Catatan:

{{ $riwayat->keterangan }}

@endif


</div>


@endforeach

</div>



@empty


<p>
Belum ada tanaman berjalan.
</p>


@endforelse



</body>
</html>