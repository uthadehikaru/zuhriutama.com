<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\{actingAs};

it('can render login', function () {
    $this->get('/login')
        ->assertStatus(200);
});

it('can render admin login', function () {
    $this->get('/admin/login')
        ->assertStatus(200);
});

test('user can login', function () {
    $pass = Hash::make(fake()->word());
    $user = User::factory()->create(['level' => 2, 'password' => $pass]);
    $this->post('/login', [
        'email' => $user->email,
        'password' => $pass,
    ])
        ->assertRedirect('/');
});

test('admin login on frontend redirect to dashboard', function () {
    $pass = fake()->word();
    $user = User::factory()->create(['level' => 1, 'password' => Hash::make($pass)]);
    $this->post('/login', [
        'email' => $user->email,
        'password' => $pass,
    ])
        ->assertRedirect(route('filament.admin.pages.dashboard'));
});

test('admin user can access the dashboard', function () {
    $user = User::factory()->create(['level' => 1]);

    actingAs($user)->get('/admin')
        ->assertStatus(200);
});

test('non authenticated user can not access the dashboard', function () {
    $this->get('/admin')
        ->assertRedirect('admin/login');
});

test('non admin user can not access the dashboard', function () {
    $user = User::factory()->create(['level' => 2]);

    $this->actingAs($user)->get('/admin')
        ->assertStatus(403);
});
