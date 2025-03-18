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
        $course = Course::create(['title' => 'Backend Development', 'teacher_id'=> 1]);
        $course = Course::create(['title' => 'Frontend Development', 'teacher_id'=> 1]);
        $course = Course::create(['title' => 'Game Development', 'teacher_id'=> 1]);
        $course = Course::create(['title' => 'Graphic Designer', 'teacher_id'=> 1]);
    }
}
