<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);
        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => fake()->paragraph(),
            'content' => fake()->text(),
            'is_published' => true,
            'published_at' => fake()->dateTime(),
            'thumbnail' => null,
        ];
    }
}