<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatTanam;
use App\Models\BatchTanam;
use App\Models\Talang;

class RiwayatTanamSeeder extends Seeder
{
    public function run(): void
    {
        $batch = BatchTanam::where(
            'kode_batch',
            'BT001'
        )->first();


        $talang = Talang::where(
            'kode_talang',
            'T001'
        )->first();


        RiwayatTanam::create([
            'id_batch' => $batch->id_batch,
            'id_talang' => $talang->id_talang,
            'tanggal' => '2026-09-01',
            'kegiatan' => 'Penyemaian benih',
            'jumlah_tanaman' => 500,
            'kondisi' => 'baik',
            'keterangan' => 'Awal proses produksi',
        ]);


        RiwayatTanam::create([
            'id_batch' => $batch->id_batch,
            'id_talang' => $talang->id_talang,
            'tanggal' => '2026-09-10',
            'kegiatan' => 'Pindah tanam ke sistem hidroponik',
            'jumlah_tanaman' => 490,
            'kondisi' => 'baik',
            'keterangan' => '10 tanaman gagal tumbuh',
        ]);
    }
}