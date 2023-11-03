<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'kode_anggota' => 'A-'.mt_rand(0000,9999),
            'username' => fake()->username(),
            'password' => bcrypt('password'),
            'status' => 'Aktif',
            'level' => 1,
            'nama_lengkap' => fake()->name()
            ]);

            \App\Models\User::create(
            [
            'kode_anggota' => 'A-'.mt_rand(0000,9999),
            'username' => fake()->username(),
            'password' => bcrypt('password'),
            'status' => 'Aktif',
            'level' => 0,
            'nama_lengkap' => fake()->name() 
            ]);
    }
}
