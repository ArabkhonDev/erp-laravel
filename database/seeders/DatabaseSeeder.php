<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Stripe\Payout;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            TeacherSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            // PaymentSeeder::class,
            FloorSeeder::class,
            RoomSeeder::class,
            LessonSeeder::class,
            PostSeeder::class,
        ]);
    }
}
