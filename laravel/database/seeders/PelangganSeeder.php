<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        Pelanggan::create([
            'id_jenpelanggan' => 1,
            'nama_pelanggan' => 'Budi Santoso',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Mawar No. 1',
        ]);


        Pelanggan::create([
            'id_jenpelanggan' => 2,
            'nama_pelanggan' => 'PT Hidroponik Sejahtera',
            'no_hp' => '081234567891',
            'alamat' => 'Jl. Industri No. 10',
        ]);


        Pelanggan::create([
            'id_jenpelanggan' => 3,
            'nama_pelanggan' => 'Restoran Hijau',
            'no_hp' => '081234567892',
            'alamat' => 'Jl. Kuliner No. 5',
        ]);
    }
}