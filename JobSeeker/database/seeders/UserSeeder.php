<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ]);

        $recruter = User::create([
            'name' => 'Recruter',
            'email' => 'recruter@gmail.com',
            'role' => 'recruter',
            'password' => Hash::make('12345678')
        ]);

        $admin = User::create([
            'name' => 'Seeker',
            'email' => 'seeker@gmail.com',
            'role' => 'seeker',
            'password' => Hash::make('12345678')
        ]);
    }
}
