<h1>Dashboard Kasir</h1>

<p>
Halo {{ auth()->user()->name }}
</p>

<p>
Role: {{ auth()->user()->userRole->nama_role }}
</p>