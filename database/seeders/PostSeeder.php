<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! app()->isProduction()) {
            $tags = fake()->words(5);
            $posts = Post::factory(10)->has(Comment::factory(5))->create();
            foreach ($posts as $post) {
                $post->attachTags(fake()->randomElements($tags, 2), 'categories');
            }
        }
    }
}
