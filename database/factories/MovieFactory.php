<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(7),
            'description' => fake()->text(),
            'movie_image' => fake()->url(),
            'release' => fake()->date(),
            'rating' => rand(4, 10),
            'trailer_link' => fake()->url(),
            'admin_id' => 1,
            'movie_type_id' => rand(1,3),
            'production_id' => rand(1,5),
            'director_id' => rand(1,5),
        ];
    }
}
