@extends('layouts.app')


@section('title')
Dashboard Admin
@endsection


@section('content')

<h1>
Dashboard Admin Hidroponik
</h1>


<div style="
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
">


<div style="
background:white;
padding:20px;
border-radius:10px;
">
<h3>
🌱 Tanaman Aktif
</h3>
<p>
-
</p>
</div>


<div style="
background:white;
padding:20px;
border-radius:10px;
">
<h3>
🥬 Panen Hari Ini
</h3>
<p>
-
</p>
</div>


<div style="
background:white;
padding:20px;
border-radius:10px;
">
<h3>
💰 Penjualan
</h3>
<p>
-
</p>
</div>


</div>


@endsection