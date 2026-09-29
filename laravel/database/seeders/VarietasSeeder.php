<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Varietas;
use App\Models\Sayur;

class VarietasSeeder extends Seeder
{
    public function run(): void
    {
        $selada = Sayur::where('kode_sayur', 'SAY001')->first();
        $pakcoy = Sayur::where('kode_sayur', 'SAY002')->first();
        $kangkung = Sayur::where('kode_sayur', 'SAY003')->first();


        Varietas::create([
            'id_sayur' => $selada->id_sayur,
            'nama_varietas' => 'Romaine Green',
            'est_bobot' => 250,
            'satuan_bobot' => 'gram',
        ]);

        Varietas::create([
            'id_sayur' => $selada->id_sayur,
            'nama_varietas' => 'Romaine Red',
            'est_bobot' => 220,
            'satuan_bobot' => 'gram',
        ]);


        Varietas::create([
            'id_sayur' => $pakcoy->id_sayur,
            'nama_varietas' => 'Green Pakcoy',
            'est_bobot' => 300,
            'satuan_bobot' => 'gram',
        ]);


        Varietas::create([
            'id_sayur' => $kangkung->id_sayur,
            'nama_varietas' => 'Bangkok',
            'est_bobot' => 150,
            'satuan_bobot' => 'gram',
        ]);
    }
}