<?php

use App\Livewire\SubscribeForm;
use App\Models\User;
use Livewire\Livewire;

it('has subscription form', function () {
    $this->get('/')
        ->assertSeeLivewire(SubscribeForm::class);
});

it('name and email is mandatory', function () {
    Livewire::test(SubscribeForm::class)
        ->call('submit')
        ->assertHasErrors('name')
        ->assertHasErrors('email');
});

it('create user when submit', function () {
    Livewire::test(SubscribeForm::class)
        ->set('name', fake()->name())
        ->set('email', fake()->safeEmail())
        ->call('submit');

    $this->assertAuthenticated();
    $this->assertEquals(1, User::count());
});
