<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['student', 'lesson'])->get();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $students = Student::all();
        $lessons = Lesson::all();
        return view('grades.create', compact('students', 'lessons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'lesson_id' => 'required|exists:lessons,id',
            'grade' => 'required|integer|min:0|max:100',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade assigned successfully.');
    }

    public function edit(Grade $grade)
    {
        $students = Student::all();
        $lessons = Lesson::all();
        return view('grades.edit', compact('grade', 'students', 'lessons'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'grade' => 'required|integer|min:0|max:100',
        ]);

        $grade->update($request->only('grade'));

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
