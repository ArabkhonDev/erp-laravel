<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => \App\Models\Group::inRandomOrder()->first()->id,
            'teacher_id' => \App\Models\Teacher::inRandomOrder()->first()->id,
            'course_id' => \App\Models\Course::inRandomOrder()->first()->id,
            'date' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'), // Keyingi 30 kun ichida
            'start_time' => Carbon::createFromTime(rand(8, 18), 0, 0)->format('H:i:s'),
            'end_time' => Carbon::createFromTime(rand(9, 19), 0, 0)->format('H:i:s'),
            'room' => 'Room ' . rand(1, 10),
        ];
    }
}
