<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BatchTanam;
use App\Models\Varietas;

class BatchTanamSeeder extends Seeder
{
    public function run(): void
    {
        $romaineGreen = Varietas::where(
            'nama_varietas',
            'Romaine Green'
        )->first();


        BatchTanam::create([
            'kode_batch' => 'BT001',
            'Id_varietas' => $romaineGreen->id_varietas,
            'tanggal_tanam' => '2026-09-01',
            'jumlah_tanam' => 500,
            'status' => 'berjalan',
            'keterangan' => 'Batch uji produksi pertama',
        ]);
    }
}