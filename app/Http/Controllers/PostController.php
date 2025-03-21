<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostView;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->cursorPaginate(3);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $statistics = PostView::where('post_id', $post->id)
            ->orderBy('viewed_at', 'desc')
            ->get();
        $dailyViews = PostView::where('post_id', $post->id)
            ->selectRaw('viewed_at, SUM(view_count) as total_views')
            ->groupBy('viewed_at')
            ->orderBy('viewed_at', 'desc')
            ->get();

        $teacherViews = PostView::where('post_id', $post->id)
            ->where('viewer_type', 'teacher')
            ->count();

        $studentViews = PostView::where('post_id', $post->id)
            ->where('viewer_type', 'student')
            ->count();
        return view('posts.show', compact('post', 'statistics', 'dailyViews', 'teacherViews', 'studentViews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success',"Muvaffaqiyatli o'chirildi");
    }
}
