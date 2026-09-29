@extends('layouts.app')

@section('title')
Edit User
@endsection


@section('content')

<h1>
Edit Pengguna
</h1>


<form method="POST"
action="{{ route('admin.users.update',$user->id) }}">

@csrf
@method('PUT')


<label>
Nama
</label>

<br>

<input type="text"
name="name"
value="{{ $user->name }}"
required>


<br><br>


<label>
Email
</label>

<br>

<input type="email"
name="email"
value="{{ $user->email }}"
required>


<br><br>


<label>
Role
</label>

<br>

<select name="role_id">

@foreach($roles as $role)

<option value="{{ $role->id }}"
@if($user->role_id == $role->id)
selected
@endif
>

{{ $role->nama_role }}

</option>

@endforeach

</select>


<br><br>


<button type="submit">
Simpan Perubahan
</button>


</form>

@endsection
