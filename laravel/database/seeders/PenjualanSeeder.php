<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        Penjualan::create([
            'kode_penjualan' => 'TRX001',
            'id_pelanggan' => 3,
            'tanggal_penjualan' => '2026-10-07',
            'total' => 350000,
            'status' => 'lunas',
            'keterangan' => 'Pesanan restoran hijau',
        ]);
    }
}