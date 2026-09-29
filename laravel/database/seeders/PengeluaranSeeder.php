<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengeluaran;

class PengeluaranSeeder extends Seeder
{
    public function run(): void
    {
        Pengeluaran::create([
            'tanggal' => '2026-09-01',
            'kategori' => 'Bahan',
            'keterangan' => 'Pembelian nutrisi AB Mix',
            'nominal' => 250000,
            'metode_pembayaran' => 'transfer',
            'referensi' => 'Nota pembelian awal',
        ]);


        Pengeluaran::create([
            'tanggal' => '2026-09-10',
            'kategori' => 'Operasional',
            'keterangan' => 'Perawatan sistem hidroponik',
            'nominal' => 100000,
            'metode_pembayaran' => 'tunai',
            'referensi' => null,
        ]);
    }
}