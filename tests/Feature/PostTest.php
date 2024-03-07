<?php

use App\Filament\Resources\PostResource;
use App\Models\Post;
use App\Models\User;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
    Post::factory(10)->create();
});

it('can list posts', function () {
    $this->get(PostResource::getUrl('index'))->assertSuccessful();
});