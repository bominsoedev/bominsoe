<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'title' => fake()->unique()->sentence(),
            'slug' => fake()->slug,
            'description' => fake()->unique()->word(), // password
            'body' => $this->faker->word(),
            'excerpt' => fake()->unique()->sentence(),
            'user_id' => 1,
        ];
    }
}
