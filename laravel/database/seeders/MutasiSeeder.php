<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mutasi;
use App\Models\Bahan;

class MutasiSeeder extends Seeder
{
    public function run(): void
    {
        $nutrisi = Bahan::where(
            'kode_bahan',
            'B002'
        )->first();


        Mutasi::create([
            'id_bahan' => $nutrisi->id_bahan,
            'tanggal' => '2026-09-01',
            'jenis_mutasi' => 'masuk',
            'jumlah' => 20,
            'stok_sebelum' => 0,
            'stok_sesudah' => 20,
            'referensi' => 'Pembelian awal nutrisi AB Mix',
        ]);


        Mutasi::create([
            'id_bahan' => $nutrisi->id_bahan,
            'tanggal' => '2026-09-10',
            'jenis_mutasi' => 'keluar',
            'jumlah' => 2,
            'stok_sebelum' => 20,
            'stok_sesudah' => 18,
            'referensi' => 'Pemakaian produksi BT001',
        ]);
    }
}