<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
      \App\Models\User::updateOrCreate(['email' => 'dev@ss2i-digital.fr'], [
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'dev@ss2i-digital.fr',
            'role' => 1,
            'password' => bcrypt('smart_pass'),
            'email_verified_at' => now()
        ]);
    }
}
