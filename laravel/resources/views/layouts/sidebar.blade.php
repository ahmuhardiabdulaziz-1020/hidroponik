<div style="
width:250px;
background:#1f2937;
color:white;
padding:20px;
min-height:100vh;
">

<h2>
🌱 Hidroponik ERP
</h2>


<a href="{{ route('dashboard') }}"
style="
color:white;
display:block;
margin:15px 0;
text-decoration:none;
">
Dashboard
</a>


<hr>


{{-- ADMIN --}}
@if(auth()->user()->role == 'admin')


<h4>
Master Data
</h4>

<a href="#" style="color:white;">
Sayur
</a>
<br>

<a href="#" style="color:white;">
Varietas
</a>
<br>

<a href="#" style="color:white;">
Talang
</a>
<br>

<a href="#" style="color:white;">
Bahan
</a>
<br>

<a href="#" style="color:white;">
Pelanggan
</a>


<h4>
Produksi
</h4>

<a href="#" style="color:white;">
Batch Tanam
</a>
<br>

<a href="#" style="color:white;">
Riwayat Tanam
</a>
<br>

<a href="#" style="color:white;">
Panen
</a>



<h4>
Persediaan
</h4>

<a href="#" style="color:white;">
Mutasi
</a>



<h4>
Penjualan
</h4>

<a href="#" style="color:white;">
Penjualan
</a>



<h4>
Keuangan
</h4>

<a href="#" style="color:white;">
Pengeluaran
</a>

<h4>
PENGATURAN
</h4>

<a href="{{ route('admin.users.index') }}"
style="color:white;">
👤 Manajemen Akun
</a>

{{-- OPERATOR --}}
@elseif(auth()->user()->role == 'operator')


<h4>
Produksi
</h4>

<a href="#" style="color:white;">
Batch Tanam
</a>

<br>

<a href="#" style="color:white;">
Riwayat Tanam
</a>

<br>

<a href="#" style="color:white;">
Panen
</a>



{{-- OWNER --}}
@elseif(auth()->user()->role == 'owner')


<h4>
Monitoring
</h4>

<a href="#" style="color:white;">
Produksi
</a>

<br>

<a href="#" style="color:white;">
Penjualan
</a>

<br>

<a href="#" style="color:white;">
Keuangan
</a>



{{-- KASIR --}}
@elseif(auth()->user()->role == 'kasir')


<h4>
Transaksi
</h4>

<a href="#" style="color:white;">
Pelanggan
</a>

<br>

<a href="#" style="color:white;">
Harga Sayur
</a>

<br>

<a href="#" style="color:white;">
Penjualan
</a>


@endif


</div>