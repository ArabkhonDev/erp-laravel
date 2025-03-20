<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Group;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Lesson ' . $this->faker->unique()->numberBetween(1, 100),
            'description' => $this->faker->sentence(),
        ];
    }
}
