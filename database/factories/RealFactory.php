<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_laporan' => $this->faker->date(),
            'up3' => $this->faker->word(),
            'ulp' => $this->faker->word(),
            'id_pelanggan' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
