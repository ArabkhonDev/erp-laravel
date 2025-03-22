<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Support\Facades\Cache;

class StudentRepository
{
    public function getAllStudents()
    {
        return Cache::remember('students', 3600, function () {
            return Student::all();
        });
    }

    public function getStudentById($id)
    {
        return Cache::remember("student_{$id}", 3600, function () use ($id) {
            return Student::find($id);
        });
    }
}
