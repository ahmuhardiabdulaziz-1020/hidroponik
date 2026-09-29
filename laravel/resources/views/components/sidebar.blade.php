<style>
.sidebar {
    height: 100vh;
    overflow-y: auto;
    overflow-x: hidden;
    box-sizing: border-box;
}

.sidebar-link {
    color: inherit;
    text-decoration: none;
}

.sidebar-link:hover {
    text-decoration: none;
}

/* Judul kelompok menu bisa diklik */
.menu-group summary {
    cursor: pointer;
    list-style: none;
    user-select: none;
}

/* Hilangkan tanda panah bawaan browser */
.menu-group summary::-webkit-details-marker {
    display: none;
}

/* Panah custom */
.menu-group summary::after {
    content: '▸';
    float: right;
}

.menu-group[open] summary::after {
    content: '▾';
}
</style>


<div class="sidebar">

    {{-- DASHBOARD --}}
    <a href="{{ route('dashboard') }}" class="menu">
        🏠 Dashboard
    </a>


    {{-- MASTER DATA --}}
    <details class="menu-group" open>

        <summary class="menu">
            <b>MASTER DATA</b>
        </summary>

        <div class="menu">
            <a href="{{ route('sayur.index') }}" class="sidebar-link">
                • Sayur
            </a>
        </div>

        <div class="menu">
            <a href="{{ route('varietas.index') }}" class="sidebar-link">
                • Varietas
            </a>
        </div>

        <div class="menu">
            <a href="{{ route('talang.index') }}" class="sidebar-link">
                • Talang
            </a>
        </div>

        <div class="menu">
            <a href="{{ route('bahan.index') }}" class="sidebar-link">
                • Bahan
            </a>
        </div>

        <div class="menu">
            <a href="{{ route('jenis-pelanggan.index') }}" class="sidebar-link">
                • Jenis Pelanggan
            </a>
        </div>

        <div class="menu">
            <a href="{{ route('pelanggan.index') }}" class="sidebar-link">
                • Pelanggan
            </a>
        </div>

    </details>


{{-- PRODUKSI --}}
<details class="menu-group">
    <summary class="menu">
        <b>PRODUKSI</b>
    </summary>

    <a href="{{ route('batch-tanam.index') }}" class="menu">
        • Batch Tanam
    </a>

    <a href="{{ route('riwayat-tanam.index') }}" class="menu">
        • Riwayat Tanam
    </a>

    <a href="/produksi/monitoring/tanaman" class="menu">
        • Monitoring Tanaman
    </a>

    <a href="#" class="menu">
        • Panen
    </a>

</details>


    {{-- PERSEDIAAN --}}
    <details class="menu-group">

        <summary class="menu">
            <b>PERSEDIAAN</b>
        </summary>

        <div class="menu">
            • Mutasi
        </div>

    </details>


    {{-- PENJUALAN --}}
    <details class="menu-group">

        <summary class="menu">
            <b>PENJUALAN</b>
        </summary>

        <div class="menu">
            • Harga
        </div>

        <div class="menu">
            • Penjualan
        </div>

    </details>


    {{-- KEUANGAN --}}
    <details class="menu-group">

        <summary class="menu">
            <b>KEUANGAN</b>
        </summary>

        <div class="menu">
            • Pengeluaran
        </div>

    </details>


{{-- PENGATURAN --}}
<details class="menu-group" open>

    <summary class="menu">
        <b>PENGATURAN</b>
    </summary>

    <div class="menu">
        <a href="{{ route('admin.users.index') }}" class="sidebar-link">
            • Manajemen Akun
        </a>
    </div>

</details>

</div>