<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bahan;

class BahanSeeder extends Seeder
{
    public function run(): void
    {
        Bahan::create([
            'kode_bahan' => 'B001',
            'nama_bahan' => 'Benih Selada Romaine',
            'jenis_bahan' => 'benih',
            'satuan_bahan' => 'gram',
            'stok' => 5000,
            'stok_minimum' => 1000,
        ]);


        Bahan::create([
            'kode_bahan' => 'B002',
            'nama_bahan' => 'Nutrisi AB Mix',
            'jenis_bahan' => 'nutrisi',
            'satuan_bahan' => 'liter',
            'stok' => 20,
            'stok_minimum' => 5,
        ]);


        Bahan::create([
            'kode_bahan' => 'B003',
            'nama_bahan' => 'Disinfektan',
            'jenis_bahan' => 'disinfektan',
            'satuan_bahan' => 'liter',
            'stok' => 10,
            'stok_minimum' => 2,
        ]);
    }
}