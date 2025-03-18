<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{

    public function run(): void
    {
        $course = Course::find(1);
        $teacher = Teacher::find(1);

        $group = Group::create([
            'name' => 'Laravel Guruh',
            'course_id' => $course->id,
            'teacher_id' => $teacher->id
        ]);

        Group::factory(10)->create()->each(function ($group) {
            // 20 ta studentni tanlab, ushbu group ga qo‘shamiz
            $students = Student::inRandomOrder()->limit(20)->pluck('id');
            $group->students()->attach($students);
        });
    }
}
