<?php

use App\Models\Post;
use Illuminate\Support\Facades\Config;

it('has a welcome page', function () {
    $this->get('/')->assertStatus(200);
});

it('no google analytic script if analytic_id not exists', function () {
    $this->get('/')->assertStatus(200)
    ->assertDontSee('GA-12345');
});

it('has google analytic script if analytic_id exists', function () {
    Config::set('app.analytic_id', 'GA-12345');
    $this->get('/')->assertStatus(200)
    ->assertSee('GA-12345');
});

it('show posts', function () {
    $post = Post::factory()->create();
    $this->get('/')->assertStatus(200)
    ->assertSeeInOrder([$post->title, $post->description]);
});