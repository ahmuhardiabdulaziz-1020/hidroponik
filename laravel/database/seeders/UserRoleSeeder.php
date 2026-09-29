<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {

        User::updateOrCreate(
            [
                'email' => 'admin@hidroponik.com'
            ],
            [
                'name' => 'Admin Hidroponik',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );


        User::updateOrCreate(
            [
                'email' => 'operator@hidroponik.com'
            ],
            [
                'name' => 'Operator Produksi',
                'password' => Hash::make('password123'),
                'role' => 'operator',
            ]
        );


        User::updateOrCreate(
            [
                'email' => 'owner@hidroponik.com'
            ],
            [
                'name' => 'Pemilik Usaha',
                'password' => Hash::make('password123'),
                'role' => 'owner',
            ]
        );


        User::updateOrCreate(
            [
                'email' => 'kasir@hidroponik.com'
            ],
            [
                'name' => 'Kasir Penjualan',
                'password' => Hash::make('password123'),
                'role' => 'kasir',
            ]
        );

    }
}