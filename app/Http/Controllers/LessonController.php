<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('id', 'asc')->paginate(10);
        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
            'video' => 'nullable|mimes:mp4,mkv,avi|max:20480',
            'document' => 'nullable|mimes:pdf,doc,docx|max:10240',
        ]);

        $lesson = new Lesson($request->only('title', 'description', 'course_id'));

        if ($request->hasFile('video')) {
            $lesson->video_path = $request->file('video')->store('videos', 'public');
        }

        if ($request->hasFile('document')) {
            $lesson->document_path = $request->file('document')->store('documents', 'public');
        }

        $lesson->save();

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        return view('lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        $lesson->update($request->only('title', 'description', 'course_id'));

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');
    }
}
