<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name'=> $this->faker->name,
            'email'=> $this->faker->name . "@gmail.com",
            'course_id'=>rand(1,4),
        ];
    }
}
