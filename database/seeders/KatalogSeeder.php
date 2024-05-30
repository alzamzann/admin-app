<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('katalogs')->insert([
            'namaBarang' => 'Katalog 1',
            'deskripsi' => 'Deskripsi Katalog 1',
            'harga' => '10000',
        ]);
    }
}
