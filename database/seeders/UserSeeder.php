<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create the REQUIRED admin user for the teacher (only if doesn't exist)
        User::firstOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
            ]
        );

        // Create test users (only if they don't exist)
        User::firstOrCreate(
            ['email' => 'test@test.com'],
            [
                'name' => 'Test User',
                'username' => 'testuser',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        User::firstOrCreate(
            ['email' => 'john@test.com'],
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );
    }
}
