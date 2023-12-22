<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->slug(3),
            'poster' => $this->faker->imageUrl(),
            'tanggal' =>  $this->faker->date($format='Y-m-d'),
            'deskripsi' => $this->faker->paragraph(10),
        ];
    }
}
