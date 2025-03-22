<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StudentController extends Controller
{
    public function index()
    {
        $students = Cache::remember('all_students', 3600, function () {
            return Student::orderBy('id', 'asc')->paginate(8);
        });
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|numeric|min:9|max:12',
        ]);

        Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        Cache::forget('all_students');
        Cache::remember('all_students', 3600, function () {
            return Student::all();
        });

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show($id)
    {
        $student  = Student::findOrFail($id);
        $post = Cache::remember("student_{$id}", 3600, function () use ($id) {
            return Student::findOrFail($id);
        });
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone'=> 'required|numeric|min:9|max:12',
        ]);

        $student->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone
        ]);

        Cache::forget("student_{$id}");
        Cache::forget('all_students');
        Cache::remember("student_{$id}", 3600, function () use ($id) {
            return Student::findOrFail($id);
        });
        Cache::remember('all_students', 3600, function () {
            return Student::all();
        });

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        // Cache-ni o‘chiramiz
        Cache::forget("student_{$id}");
        Cache::forget('all_students');
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
