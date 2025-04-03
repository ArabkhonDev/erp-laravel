<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Group;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => 'Lesson ' . $this->faker->unique()->numberBetween(1, 100),
            'description' => $this->faker->sentence(),
        ];
    }
}
