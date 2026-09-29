@extends('layouts.app')

@section('title')
Manajemen Akun
@endsection

@section('content')

<h1>
Pengaturan Akun
</h1>

<a href="{{ route('admin.users.create') }}"
style="
display:inline-block;
margin-bottom:20px;
padding:10px 15px;
background:#198754;
color:white;
border-radius:8px;
text-decoration:none;
">
+ Tambah Pengguna
</a>


@if(session('success'))

<div style="
background:#d1e7dd;
padding:10px;
border-radius:8px;
margin-bottom:20px;
">
{{ session('success') }}
</div>

@endif


<table width="100%" cellpadding="10" cellspacing="0" style="background:white;border-radius:10px;">

<tr>
<th align="left">Nama</th>
<th align="left">Email</th>
<th align="left">Role</th>
<th align="left">Status</th>
<th>Aksi</th>
</tr>


@foreach($users as $user)

<tr>

<td>
{{ $user->name }}
</td>


<td>
{{ $user->email }}
</td>


<td>
{{ $user->userRole->nama_role ?? '-' }}
</td>


<td>

@if($user->status)

<span style="color:green">
Aktif
</span>

@else

<span style="color:red">
Nonaktif
</span>

@endif

</td>


<td>

<td>

<a href="{{ route('admin.users.edit',$user->id) }}">
Edit
</a>


@if($user->status)

<form
action="{{ route('admin.users.destroy',$user->id) }}"
method="POST"
style="display:inline"
>

@csrf
@method('DELETE')

<button type="submit"
onclick="return confirm('Nonaktifkan user ini?')">
Nonaktifkan
</button>

</form>


@else


<form
action="{{ route('admin.users.activate',$user->id) }}"
method="POST"
style="display:inline"
>

@csrf
@method('PATCH')

<button type="submit">
Aktifkan
</button>

</form>


@endif

</td>

</td>

</tr>

@endforeach


</table>

@endsection
