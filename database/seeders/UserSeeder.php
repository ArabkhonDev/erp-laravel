<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arabjon',
            'role_id'=> 1,
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'phone'=> fake()->phoneNumber(),
            'pnfl'=> fake()->numberBetween(50000000000001, 50000000001099),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

       
    }
}
