<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HargaSayur;
use App\Models\Sayur;
use App\Models\JenisPelanggan;

class HargaSayurSeeder extends Seeder
{
    public function run(): void
    {
        $selada = Sayur::where('kode_sayur', 'SAY001')->first();

        $individu = JenisPelanggan::where(
            'jenis_pelanggan',
            'individu'
        )->first();

        $usaha = JenisPelanggan::where(
            'jenis_pelanggan',
            'usaha'
        )->first();

        $restoran = JenisPelanggan::where(
            'jenis_pelanggan',
            'restoran'
        )->first();


        HargaSayur::create([
            'id_sayur' => $selada->id_sayur,
            'id_jenpelanggan' => $individu->id_jenpelanggan,
            'harga' => 45000,
            'satuan' => 'kg',
            'tanggal_mulai' => '2026-09-01',
        ]);


        HargaSayur::create([
            'id_sayur' => $selada->id_sayur,
            'id_jenpelanggan' => $usaha->id_jenpelanggan,
            'harga' => 40000,
            'satuan' => 'kg',
            'tanggal_mulai' => '2026-09-01',
        ]);


        HargaSayur::create([
            'id_sayur' => $selada->id_sayur,
            'id_jenpelanggan' => $restoran->id_jenpelanggan,
            'harga' => 35000,
            'satuan' => 'kg',
            'tanggal_mulai' => '2026-09-01',
        ]);
    }
}