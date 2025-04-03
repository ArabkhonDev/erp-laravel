<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Group ' . $this->faker->unique()->numberBetween(1, 50),
            'course_id' => Course::inRandomOrder()->first()->id ?? Course::factory(),
            'teacher_id' => Teacher::inRandomOrder()->first()->id ?? Teacher::factory(),
        ];
    }
}
