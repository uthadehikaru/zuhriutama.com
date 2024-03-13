<?php

use App\Filament\Resources\TagsResource;
use App\Models\Post;
use App\Models\User;
use Spatie\Tags\Tag;

test('admin can list tags', function () {
    $this->actingAs(User::factory()->create());
    foreach (fake()->words() as $tag) {
        Tag::findOrCreateFromString($tag);
    }
    $this->get(TagsResource::getUrl('index'))->assertSuccessful();
});

test('guest can see post related tags', function () {
    $tag = Tag::findOrCreateFromString('tags-test');
    $post = Post::factory()->create();
    $post->attachTag($tag);
    $this->get(route('tags.show', $tag->name))
        ->assertOk()
        ->assertSeeInOrder([$post->title, $post->description]);
});

test('guest can not see not exist tag', function () {
    $this->get(route('tags.show', 'tag-test'))
        ->assertNotFound();
});
