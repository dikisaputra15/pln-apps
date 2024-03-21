<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Real::factory(10)->create();

        \App\Models\Real::create([
            'tanggal_laporan' => '2024-03-01',
            'up3' => 'UP3 Banten Utara',
            'ulp' => 'ULP Serang',
            'id_pelanggan' => '539111397135',
        ]);
    }
}
