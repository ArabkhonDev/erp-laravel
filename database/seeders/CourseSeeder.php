<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = ['Backend Development', 'Frontend Development', 'Game Development', 'Graphic Designer'];
        foreach ($courses as $course) {
            Course::create([
                'title' => $course,
                'teacher_id' => rand(1, 10),
            ]);
        }
    }
}
