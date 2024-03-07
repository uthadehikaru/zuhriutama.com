<?php

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use App\Models\User;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
    Comment::factory(10)->create();
});

it('can list comments', function () {
    $this->get(CommentResource::getUrl('index'))->assertSuccessful();
});