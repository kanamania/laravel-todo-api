<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::cre
        User::create([
            'name' => 'Kanai Lomayani',
            'email' => 'k.mahenge@gmail.com',
            'password' => '123',
            'email_verified_at' => now(),
            'created_at' => now(),
            'modified_at' => now(),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
