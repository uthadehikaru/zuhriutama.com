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
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => $this->faker->text(),
            'content' => $this->faker->text(),
            'posted_at' => $this->faker->dateTimeThisMonth(),
            'is_published' => $this->faker->boolean(70),
        ];
    }
}
