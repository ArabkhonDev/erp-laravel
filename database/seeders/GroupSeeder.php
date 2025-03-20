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
        $course = Course::find(1);

        $group = Group::create([
            'name' => 'Laravel Guruh',
            'teacher_id' => $teacher->id,
            'course_id'=> $course->id,
        ]);

        Group::factory(10)->create()->each(function ($group) {
            // 20 ta studentni tanlab, ushbu group ga qo‘shamiz
            $students = Student::inRandomOrder()->limit(20)->pluck('id');
            $lessons = Lesson::inRandomOrder()->limit(12)->pluck('id');
            $group->students()->attach($students);
            $group->lessons()->attach($lessons);
        });
    }
}
