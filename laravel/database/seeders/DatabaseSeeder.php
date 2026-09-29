<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
    $this->call([
        
        RoleSeeder::class,
        UserRoleSeeder::class,
        SayurSeeder::class,
        VarietasSeeder::class,
        TalangSeeder::class,

        JenisPelangganSeeder::class,
        PelangganSeeder::class,

        BahanSeeder::class,

        HargaSayurSeeder::class,

        BatchTanamSeeder::class,
        RiwayatTanamSeeder::class,
        PanenSeeder::class,

        MutasiSeeder::class,
        
        PenjualanSeeder::class,
        DetailPenjualanSeeder::class,
        AlokasiPenjualanSeeder::class,
        
        PengeluaranSeeder::class,
        
        
        
    ]);
    }
}