<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{

    public function run(): void
    {
        $teacher = Teacher::find(1);
        $courses = Course::all();

        foreach ($courses as $course) {
            for ($i = 1; $i <= 5; $i++) {
                Group::create([
                    'name' => $course->name . " Group " . $i,
                    'teacher_id' => $teacher->id,
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
