<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPelanggan;

class JenisPelangganSeeder extends Seeder
{
    public function run(): void
    {
        JenisPelanggan::create([
            'jenis_pelanggan' => 'individu',
        ]);

        JenisPelanggan::create([
            'jenis_pelanggan' => 'usaha',
        ]);

        JenisPelanggan::create([
            'jenis_pelanggan' => 'restoran',
        ]);

        JenisPelanggan::create([
            'jenis_pelanggan' => 'lainnya',
        ]);
    }
}