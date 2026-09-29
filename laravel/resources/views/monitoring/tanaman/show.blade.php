@extends('layouts.app')

@section('content')

<div class="container">

    <h1>
        🌱 Detail Monitoring Tanaman
    </h1>

    <a href="{{ route('monitoring.tanaman.index') }}"
    style="
    display:inline-block;
    margin-bottom:20px;
    background:#065f46;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    ">
    ← Kembali ke Monitoring
    </a>

    <a href="{{ route('monitoring.harian.create',$talang->id_talang) }}"
    style="
    display:inline-block;
    margin-bottom:20px;
    margin-left:10px;
    background:#16a34a;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    ">
    + Tambah Monitoring
    </a>

    <hr>

    <div>
    <div style="
    background:white;
    padding:20px;
    border-radius:12px;
    margin-bottom:20px;
    box-shadow:0 2px 8px rgba(0,0,0,.1);
    ">

    <h2>
    🌱 Talang {{ $monitoring['kode_talang'] }}
    </h2>

    <p>
    <b>Sistem:</b>
    {{ $monitoring['tipe_talang'] }}
    </p>

    <p>
    <b>Tanaman:</b>
    {{ $monitoring['nama_sayur'] }}
    </p>

    <p>
    <b>Varietas:</b>
    {{ $monitoring['nama_varietas'] }}
    </p>

    </div>
    </div>


    <hr>


    <div style="
    background:white;
    padding:20px;
    border-radius:12px;
    margin-bottom:20px;
    box-shadow:0 2px 8px rgba(0,0,0,.1);
    ">

    <h2>
    📊 Kondisi Tanaman
    </h2>

    <p>
    <b>Umur:</b>
    {{ $monitoring['umur_hari'] }} hari
    </p>

    <p>
    <b>Fase:</b>
    {{ $monitoring['fase_aktual'] }}
    </p>


    <div style="
    background:#ddd;
    height:20px;
    border-radius:10px;
    overflow:hidden;
    ">

    <div style="
    background:#16a34a;
    height:100%;
    width:{{ $monitoring['progress'] }}%;
    ">
    </div>

    </div>

    <p>
    Progress:
    {{ $monitoring['progress'] }}%
    </p>

    </div>


    <hr>


    <h3>🥬 Prediksi Panen</h3>

    <p>
        Tanggal Panen:
        {{ $monitoring['tanggal_prediksi_panen'] }}
    </p>

    <p>
        Sisa:
        {{ $monitoring['sisa_hari_panen'] }} hari
    </p>


    <hr>


    <h3>Status</h3>

    <p>
        {{ $monitoring['status_label'] }}
    </p>


</div>

<div style="
background:white;
padding:20px;
border-radius:12px;
margin-bottom:20px;
box-shadow:0 2px 8px rgba(0,0,0,.1);
">

<h2>
🌱 Timeline Pertumbuhan
</h2>


@php
    $fase = $monitoring['fase_aktual'];
@endphp


<div style="margin-top:20px">


<div>
    🌱 Semai

    @if($fase == 'semai')
        <b style="color:green">
            ● Saat ini
        </b>
    @else
        ✓
    @endif

</div>


<div style="margin-top:15px">
    🌿 Remaja

    @if($fase == 'remaja')
        <b style="color:green">
            ● Saat ini
        </b>
    @elseif(in_array($fase,['dewasa']))
        ✓
    @else
        ○
    @endif

</div>


<div style="margin-top:15px">
    🥬 Dewasa

    @if($fase == 'dewasa')
        <b style="color:green">
            ● Saat ini
        </b>
    @else
        ○
    @endif

</div>


<div style="margin-top:15px">
    ✂️ Panen

    @if($monitoring['sisa_hari_panen'] <= 0)
        <b style="color:green">
            ● Siap Panen
        </b>
    @else
        ○
    @endif

</div>


</div>

<div style="
background:white;
padding:20px;
border-radius:12px;
margin-bottom:20px;
box-shadow:0 2px 8px rgba(0,0,0,.1);
">

<h2>
🥬 Prediksi Panen
</h2>

<p>
<b>Tanggal Prediksi:</b>
{{ $monitoring['tanggal_prediksi_panen'] }}
</p>

<p>
<b>Sisa Waktu:</b>

@if($monitoring['sisa_hari_panen'] > 0)

{{ $monitoring['sisa_hari_panen'] }}
hari lagi

@else

<span style="color:green;font-weight:bold">
Siap Panen
</span>

@endif

</p>

</div>
<div style="
background:white;
padding:20px;
border-radius:12px;
margin-bottom:20px;
box-shadow:0 2px 8px rgba(0,0,0,.1);
">

<h2>
🩺 Status Tanaman
</h2>


<p>
Status:
<b>
{{ $monitoring['status_label'] }}
</b>
</p>


<p>
Kondisi fase:

{{ $monitoring['fase_aktual'] }}

</p>



</div>
<hr>

<h2>
📋 Riwayat Monitoring
</h2>


<table width="100%" border="1" cellpadding="8">

<thead>

<tr>
    <th>Tanggal</th>
    <th>Hidup</th>
    <th>Mati</th>
    <th>Tinggi (cm)</th>
    <th>Daun</th>
    <th>pH</th>
    <th>EC</th>
    <th>Suhu Air</th>
    <th>Kondisi</th>
    <th>Catatan</th>
</tr>

</thead>


<tbody>

@forelse($riwayatMonitoring as $item)

<tr>

<td>
{{ \Carbon\Carbon::parse($item->tanggal_monitoring)->format('d-m-Y') }}
</td>


<td>
{{ $item->jumlah_hidup }}
</td>


<td>
{{ $item->jumlah_mati }}
</td>


<td>
{{ $item->tinggi_tanaman ?? '-' }}
</td>


<td>
{{ $item->jumlah_daun ?? '-' }}
</td>


<td>
{{ $item->ph_air ?? '-' }}
</td>


<td>
{{ $item->ec_air ?? '-' }}
</td>


<td>
{{ $item->suhu_air ?? '-' }}
</td>


<td>
{{ ucfirst($item->kondisi) }}
</td>


<td>
{{ $item->catatan ?? '-' }}
</td>


</tr>


@empty

<tr>

<td colspan="10">
Belum ada monitoring
</td>

</tr>

@endforelse


</tbody>

</table>

</div>



@endsection