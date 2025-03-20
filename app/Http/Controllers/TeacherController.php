<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {   
        $teachers = Teacher::orderBy('id', 'asc')->cursorPaginate(8);
        return view('teachers.index')->with(['teachers'=> $teachers]);
    }

    public function create()
    {
        $courses = Course::orderBy('id', 'asc')->get();

        return view('teachers.create')->with(['courses'=> $courses ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable',
        ]);

        Teacher::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('students.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $teacher->id,
            'phone'=> 'required',
        ]);

        $teacher->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
