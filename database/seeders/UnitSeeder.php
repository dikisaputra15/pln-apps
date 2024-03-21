<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Unit::factory(10)->create();

        \App\Models\Unit::create([
            'uid' => 'UID Banten',
            'up3' => 'UP3 Banten Selatan',
            'ulp' => 'ULP Rangkasbitung',
        ]);
    }
}
