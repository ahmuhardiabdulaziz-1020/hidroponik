<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Panen;
use App\Models\BatchTanam;

class PanenSeeder extends Seeder
{
    public function run(): void
    {
        $batch = BatchTanam::where(
            'kode_batch',
            'BT001'
        )->first();


        Panen::create([
            'id_batch' => $batch->id_batch,
            'tanggal_panen' => '2026-10-06',
            'jumlah_tanaman' => 480,
            'berat_panen' => 120,
            'satuan_berat' => 'kg',
            'kualitas' => 'baik',
            'catatan' => 'Panen pertama batch BT001',
        ]);
    }
}