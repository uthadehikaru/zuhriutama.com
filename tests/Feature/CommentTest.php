<?php

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

test('admin can list comments', function () {
    $this->actingAs(User::factory()->create());
    Comment::factory(10)->create();
    $this->get(CommentResource::getUrl('index'))->assertSuccessful();
});

test('guest can see comments', function () {
    $post = Post::factory()->has(Comment::factory(5))->create();
    $this->get(route('post.show', $post->slug))
        ->assertOk()
        ->assertSeeInOrder($post->comments()->published()->pluck('name')->toArray());
});

test('guest can sent comment', function () {
    $post = Post::factory()->create();
    $comment = [
        'name' => fake()->name(),
        'email' => fake()->safeEmail(),
        'message' => fake()->sentence(),
    ];

    Livewire::test('comment-form', ['post_id' => $post->id])
        ->assertSee('Kirim Komentar')
        ->fillForm($comment)
        ->call('create');

    $this->assertDatabaseCount('comments', 1);
    $this->assertDatabaseHas('comments', $comment);
});
