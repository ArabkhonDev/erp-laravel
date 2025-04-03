<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'=> $this->faker->firstname . $this->faker->lastName(),
            'email'=> $this->faker->email,
            'group_id'=>Group::inRandomOrder('id')->first()->id,
        ];
    }
}
