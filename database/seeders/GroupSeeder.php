<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Group::create([
                'name' => 'Group ' . fake()->unique()->numberBetween(1, 50),
                'course_id' => Course::inRandomOrder()->first()->id ?? Course::factory(),
                'teacher_id' => Teacher::inRandomOrder()->first()->id ?? Teacher::factory(),
                'start_time' => fake()->time(),
                'end_time' => fake()->time(),
                'start_month' => fake()->date(),
            ]);
        }
    }
}
