<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::firstOrCreate([
            'email' => 'me@zuhriutama.com',
        ], [
            'name' => 'Zuhri Utama',
            'password' => Hash::make('Zuhri100%'),
            'level' => 1,
            'email_verified_at' => now(),
        ]);

        $this->call([
            PostSeeder::class,
        ]);
    }
}
