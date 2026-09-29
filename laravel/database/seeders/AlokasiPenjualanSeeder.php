<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlokasiPenjualan;

class AlokasiPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        AlokasiPenjualan::create([

            'id_detpenjualan' => 1,

            'id_panen' => 1,

            'jumlah' => 10,

            'satuan' => 'kg',

            'keterangan' =>
                'Alokasi panen BT001 untuk transaksi TRX001',

        ]);
    }
}