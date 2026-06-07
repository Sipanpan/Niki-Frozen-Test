<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'nama_lengkap' => 'Administrator',
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@nikifrozen.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Kasir User
        User::create([
            'nama_lengkap' => 'Kasir Niki Frozen',
            'name' => 'Kasir',
            'username' => 'kasir',
            'email' => 'kasir@nikifrozen.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        // Kategori
        $kategoris = ['Frozen Food', 'Es Krim', 'Daging & Ayam', 'Ikan & Seafood', 'Sayuran Beku', 'Minuman', 'Snack', 'Bumbu & Saus'];
        foreach ($kategoris as $k) {
            Kategori::create(['nama' => $k]);
        }

        // Satuan
        $satuans = [
            ['nama' => 'Pcs', 'singkatan' => 'pcs'],
            ['nama' => 'Pack', 'singkatan' => 'pack'],
            ['nama' => 'Kg', 'singkatan' => 'kg'],
            ['nama' => 'Gram', 'singkatan' => 'gr'],
            ['nama' => 'Box', 'singkatan' => 'box'],
            ['nama' => 'Liter', 'singkatan' => 'ltr'],
            ['nama' => 'Dus', 'singkatan' => 'dus'],
        ];
        foreach ($satuans as $s) {
            Satuan::create($s);
        }
    }
}
