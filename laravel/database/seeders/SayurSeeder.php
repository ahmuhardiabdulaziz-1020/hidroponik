<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sayur;

class SayurSeeder extends Seeder
{
    public function run(): void
    {
        Sayur::create([
            'kode_sayur' => 'SAY001',
            'nama_sayur' => 'Selada Romaine',
            'durasi_semai' => 7,
            'durasi_remaja' => 14,
            'durasi_panen' => 35,
        ]);

        Sayur::create([
            'kode_sayur' => 'SAY002',
            'nama_sayur' => 'Pakcoy',
            'durasi_semai' => 7,
            'durasi_remaja' => 14,
            'durasi_panen' => 30,
        ]);

        Sayur::create([
            'kode_sayur' => 'SAY003',
            'nama_sayur' => 'Kangkung',
            'durasi_semai' => 5,
            'durasi_remaja' => 10,
            'durasi_panen' => 25,
        ]);
    }
}