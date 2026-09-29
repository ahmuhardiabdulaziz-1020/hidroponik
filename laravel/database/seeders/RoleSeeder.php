<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([

            [
                'nama_role' => 'Administrator',
                'kode_role' => 'admin',
                'deskripsi' => 'Mengelola seluruh sistem',
                'status' => true,
            ],

            [
                'nama_role' => 'Operator Produksi',
                'kode_role' => 'operator',
                'deskripsi' => 'Mengelola kegiatan produksi hidroponik',
                'status' => true,
            ],

            [
                'nama_role' => 'Owner',
                'kode_role' => 'owner',
                'deskripsi' => 'Melihat laporan dan informasi usaha',
                'status' => true,
            ],

            [
                'nama_role' => 'Kasir',
                'kode_role' => 'kasir',
                'deskripsi' => 'Mengelola transaksi',
                'status' => true,
            ],

        ]);
    }
}