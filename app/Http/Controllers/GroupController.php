<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Cache::remember('all_groups', 3600, function () {
           return Group::orderBy('id', 'asc')->cursorPaginate(10);
        });
        return view('groups.index', compact('groups'));
        // return response()->json($groups);
    }

    public function create()
    {
        $courses = Course::select('name')->get();
        $teachers = Teacher::select('name')->get();
        return view('groups.create', compact('courses', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        $group = Group::create([
            'name'=> $request->name,
            'course_id'=> $request->course_id,
            'teacher_id'=> $request->teacher_id,
        ]);
        Cache::forget('all_groups');
        Cache::remember('all_groups', 3600, function () {
            return Group::all();
        });

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    public function show( $id)
    {
        $group = Cache::remember("group_{$id}", 3600, function () use ($id) {
            return Group::findOrFail($id);
        });
        return view('groups.show', compact('group'));
    }

    public function edit(Group $group)
    {
        $courses = Course::all();
        return view('groups.edit', compact('group', 'courses'));
    }

    public function update(Request $request, Group $id)
    {
        $group = Group::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);
        Cache::forget("group_{$id}");
        Cache::forget('all_groups');
        Cache::remember("group_{$id}", 3600, function () use ($id) {
            return Group::findOrFail($id);
        });
        Cache::remember('all_groups', 3600, function () {
            return Group::all();
        });

        $group->update([
            'name'=>$request->name,
            'course_id'=>$request->course_id,
        ]);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    public function destroy( $id)
    {
        $post = Group::findOrFail($id);
        $post->delete();

        // Cache-ni o‘chiramiz
        Cache::forget("group_{$id}");
        Cache::forget('all_groups');

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
