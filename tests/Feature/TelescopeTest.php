<?php

use App\Models\User;

test('only admin can access telescope', function () {
    $this->assertEquals(
        url(config('telescope.path')),
        route('telescope')
    );

    $this->actingAs(User::factory()->create());
    $this->get('/admin/telescope')->assertOk();

    $this->actingAs(User::factory()->create(['level' => 2]));
    $this->get('/admin/telescope')->assertStatus(403);
});
