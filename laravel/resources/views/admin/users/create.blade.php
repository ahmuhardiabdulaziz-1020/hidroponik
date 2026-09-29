@extends('layouts.app')

@section('title')
Tambah User
@endsection


@section('content')

<h1>
Tambah Pengguna
</h1>


<form method="POST"
action="{{ route('admin.users.store') }}">

@csrf


<label>
Nama
</label>

<br>

<input type="text"
name="name"
required>


<br><br>


<label>
Email
</label>

<br>

<input type="email"
name="email"
required>


<br><br>


<label>
Password
</label>

<br>

<input type="password"
name="password"
required>


<br><br>


<label>
Role
</label>

<br>

<select name="role_id">

@foreach($roles as $role)

<option value="{{ $role->id }}">
{{ $role->nama_role }}
</option>

@endforeach

</select>


<br><br>


<button type="submit">
Simpan
</button>


</form>

@endsection
