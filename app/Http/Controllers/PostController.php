<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostView;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Cache::remember('all_posts', 60, function () {
            return Post::orderBy("created_at", "asc")->cursorPaginate(3);
        });

        // dd($posts);

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
        $post = Post::create([
            'title' => $request->title,
            'shorrt_content' => $request->content,
            'content' => $request->content,
            'image' => $request->image ?? null,
        ]);

        // Yangi postni cache-ga qo‘shamiz
        Cache::forget('all_posts');
        Cache::remember('all_posts', 3600, function () {
            return Post::all();
        });

        return redirect()->route('posts.index')->with('success', 'muvafaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        // dd($post);
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
        $post = Cache::remember("post_{$id}", 3600, function () use ($id) {
            return Post::findOrFail($id);
        });

        return view('posts.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'shorrt_content' => $request->content,
            'content' => $request->content,
            'image' => $request->image ?? null,
        ]);

        // Yangi postni cache-ga qo‘shamiz
        Cache::forget("post_{$id}");
        Cache::forget('all_posts');
        Cache::remember("post_{$id}", 3600, function () use ($id) {
            return Post::findOrFail($id);
        });
        Cache::remember('all_posts', 3600, function () {
            return Post::all();
        });

        return redirect()->route('posts.index')->with('success', 'muvafaqiyatli yaratildi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        // Cache-ni o‘chiramiz
        Cache::forget("post_{$id}");
        Cache::forget('all_posts');

        return redirect()->route('posts.index')->with('success', "Muvaffaqiyatli o'chirildi");
    }
}
