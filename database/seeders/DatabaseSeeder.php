<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ameer Shah',
            'email' => 'hello@ameershah.my',
            'password' => bcrypt('password'),
            'type' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Tester',
            'email' => 'test@ameershah.my',
            'password' => bcrypt('password'),
            'type' => 'user',
        ]);
    }
}
