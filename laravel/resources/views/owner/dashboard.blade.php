<h1>Dashboard Owner</h1>

<p>
Halo {{ auth()->user()->name }}
</p>

<p>
Role: {{ auth()->user()->userRole->nama_role }}
</p>