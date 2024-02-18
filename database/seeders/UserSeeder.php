<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = bcrypt('password');

        User::factory()->create([
            'name' => 'Admin',
            'surname' => 'Test',
            'lastname' => 'Kata',
            'role' => 'admin',
            'email' => 'admintest@mail.ru',
            'password' => $password,
        ]);
    }
}
