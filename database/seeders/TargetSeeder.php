<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Target::factory(10)->create();

        \App\Models\Target::create([
            'tanggal' => '2024-03-01',
            'unit' => 'UP3 Banten Utara',
            'target' => 50,
            'realisasi' => 0,
        ]);
    }
}
