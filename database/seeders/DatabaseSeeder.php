<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesAndPermissionsSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        $user = \App\Models\User::updateOrCreate(['email' => 'dev@ss2i-digital.fr'], [
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'dev@ss2i-digital.fr',
            'password' => bcrypt('smart_pass'),
            'email_verified_at' => now()
        ]);
        $user->assignRole('super-admin');
    }
}
