<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TeacherController extends Controller
{
    public function index()
    {   
        $teachers = Cache::remember('all_teachers', 3600, function () {
            return Teacher::orderBy('id', 'asc')->cursorPaginate(8);
        });
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

        Cache::forget('all_teachers');
        Cache::remember('all_teachers', 3600, function () {
            return Teacher::all();
        });

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }

    public function show( $id)
    {
        $teacher  = Teacher::findOrFail($id);
        $teacher = Cache::remember("teacher_{$id}", 3600, function () use ($id) {
            return Teacher::findOrFail($id);
        });
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
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

        Cache::forget("teacher_{$id}");
        Cache::forget('all_teachers');
        Cache::remember("teacher_{$id}", 3600, function () use ($id) {
            return Teacher::findOrFail($id);
        });
        Cache::remember('all_teachers', 3600, function () {
            return Teacher::all();
        });

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        // Cache-ni o‘chiramiz
        Cache::forget("teacher_{$id}");
        Cache::forget('all_teachers');
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
