<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Talang;

class TalangSeeder extends Seeder
{
    public function run(): void
    {
        Talang::create([
            'kode_talang' => 'T001',
            'tipe_talang' => 'NFT 6 meter',
            'kapasitas' => 500,
            'keterangan' => 'Talang produksi utama',
        ]);
    }
}