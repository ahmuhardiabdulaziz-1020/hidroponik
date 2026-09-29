@extends('layouts.app')

@section('title')
Monitoring Talang
@endsection


@section('content')


<style>

.summary{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-bottom:30px;
}


.summary-card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
}


.summary-card h3{
    margin:0;
    color:#777;
}


.summary-card p{
    font-size:32px;
    font-weight:bold;
    margin:10px 0;
}


.talang-card{

    background:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;

    box-shadow:
    0 5px 15px rgba(0,0,0,.08);

}


.header{

    display:flex;
    justify-content:space-between;
    align-items:center;

}


.kode{

    font-size:30px;
    font-weight:bold;

}


.badge{

    padding:8px 18px;
    border-radius:20px;
    background:#dff5df;
    color:#267326;

}


.info{

    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
    margin-top:20px;

}


.item{

    background:#f8f8f8;
    padding:15px;
    border-radius:12px;

}


.progress{

    height:18px;
    background:#ddd;
    border-radius:20px;
    overflow:hidden;

}


.progress-fill{

    height:100%;
    background:#4caf50;

}


</style>


<h1>
🌱 Monitoring Talang
</h1>



<div class="summary">


<div class="summary-card">

<h3>
Total Talang Aktif
</h3>

<p>
{{ $summary['total_talang'] }}
</p>

</div>



<div class="summary-card">

<h3>
Total Tanaman
</h3>

<p>
{{ $summary['total_tanaman'] }}
</p>

</div>



<div class="summary-card">

<h3>
Panen Terdekat
</h3>

<p>
{{ $summary['akan_panen'] }}
Hari
</p>

</div>


</div>




@forelse($monitoring as $item)


<div class="talang-card">
<a href="{{ route('monitoring.tanaman.show',$item['id_talang']) }}">
    Lihat Detail
</a>


<div class="header">


<div class="kode">

{{ $item['kode_talang'] }}

</div>


<div class="badge">

{{ strtoupper($item['fase_talang']) }}

</div>


</div>



<h2>

{{ $item['nama_sayur'] }}

</h2>



<p>

Varietas :

<b>
{{ $item['nama_varietas'] }}
</b>

</p>




<div class="info">


<div class="item">

<b>
Tipe Talang
</b>

<br>

{{ $item['tipe_talang'] }}

</div>



<div class="item">

<b>
Jumlah
</b>

<br>

{{ $item['jumlah_aktual'] }}

tanaman

</div>




<div class="item">

<b>
Umur
</b>

<br>

{{ $item['umur_hari'] }}

hari

</div>




<div class="item">

<b>
Panen
</b>

<br>

{{ $item['sisa_hari_panen'] }}

hari lagi

</div>


</div>




<div class="phase">

Progress Tanaman

</div>


<div class="progress">

<div class="progress-fill"

style="
width:{{ $item['progress'] }}%
">

</div>

</div>


<p>

Hari ke 
<b>
{{ $item['umur_hari'] }}
</b>

|

{{ $item['progress'] }}%

</p>



</div>


@empty


<p>
Belum ada tanaman aktif.
</p>


@endforelse

@endsection



</body>
</html>