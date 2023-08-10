<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'country' => 'Bangladesh',
            'date_of_birth' => '1990-01-01',
            'profile_image' => 'profile.jpg',
            'password' => Hash::make('password'),
        ]); 
        User::create(['name' => 'Admin',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'country' => 'Bangladesh',
            'date_of_birth' => '1990-01-01',
            'profile_image' => 'profile.jpg',
            'password' => Hash::make('password'),
        ]); 
    }
}
