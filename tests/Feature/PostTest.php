<?php

use App\Filament\Resources\PostResource;
use App\Models\Post;
use App\Models\User;

test('admin can list posts', function () {
    $this->actingAs(User::factory()->create());
    Post::factory(10)->create();
    $this->get(PostResource::getUrl('index'))->assertSuccessful();
});

test('guest can see post detail', function () {
    $post = Post::factory()->create();
    $this->get(route('post.show', $post->slug))
    ->assertOk()
    ->assertSeeInOrder([$post->title, $post->description]);
});

test('guest can not see unpublished post', function () {
    $post = Post::factory()->create(['is_published'=>false]);
    $this->get(route('post.show', $post->slug))
    ->assertStatus(403);
});

test('admin can see edit link on post detail', function () {
    //
})->todo();