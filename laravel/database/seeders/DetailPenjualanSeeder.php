<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPenjualan;

class DetailPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DetailPenjualan::create([
            'id_sayur' => 1,
            'id_penjualan' => 1,
            'jumlah' => 10,
            'satuan' => 'kg',
            'harga_satuan' => 35000,
            'subtotal' => 350000,
            'keterangan' => 'Selada Romaine pesanan restoran',
        ]);
    }
}