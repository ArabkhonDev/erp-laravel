<?php

namespace App\Repositories;

use App\Models\Teacher;
use Illuminate\Support\Facades\Cache;

class TeacherRepository
{
    public function getAllTeachers()
    {
        return Cache::remember('teachers', 3600, function () {
            return Teacher::all();
        });
    }

    public function getTeacherById($id)
    {
        return Cache::remember("teacher_{$id}", 3600, function () use ($id) {
            return Teacher::find($id);
        });
    }
}
