@extends('layouts.app')

@section('title','Edit Varietas')

@section('content')


<h1>Edit Varietas</h1>


<form
action="/varietas/{{ $varietas->id_varietas }}"
method="POST"
>


@csrf
@method('PUT')

<div>
<label>Sayur</label>

<select name="id_sayur">

@foreach($sayurs as $sayur)

<option
value="{{ $sayur->id_sayur }}"
{{ $sayur->id_sayur == $varietas->id_sayur ? 'selected' : '' }}
>
{{ $sayur->nama_sayur }}
</option>

@endforeach

</select>

</div>



<br>


<div>
<label>Nama Varietas</label>

<input 
type="text"
name="nama_varietas"
value="{{ $varietas->nama_varietas }}"
>

</div>


<br>


<div>
<label>Estimasi Bobot</label>

<input 
type="number"
name="est_bobot"
value="{{ $varietas->est_bobot }}"
>

</div>


<br>


<div>
<label>Satuan</label>

<input 
type="text"
name="satuan_bobot"
value="{{ $varietas->satuan_bobot }}"
>

</div>


<br>


<button type="submit">
Update
</button>


</form>


@endsection
