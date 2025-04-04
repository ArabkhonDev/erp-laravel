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
    public function index()
    {

        $posts = Cache::remember('all_posts', 60, function () {
            return Post::orderBy("created_at", "asc")->cursorPaginate(3);
        });

        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'shorrt_content' => $request->content,
            'content' => $request->content,
            'image' => $request->image ?? null,
        ]);

        Cache::forget('all_posts');
        Cache::remember('all_posts', 3600, function () {
            return Post::all();
        });

        return redirect()->route('posts.index')->with('success', 'muvafaqiyatli yaratildi');
    }

    public function show(Post $post)
    {
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
        $post = Cache::remember("post_{$post->id}", 3600, function () use ($post) {
            return $post;
        });

        return view('posts.show')->with(['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'shorrt_content' => $request->content,
            'content' => $request->content,
            'image' => $request->image ?? null,
        ]);

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

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Cache::forget("post_{$id}");
        Cache::forget('all_posts');

        return redirect()->route('posts.index')->with('success', "Muvaffaqiyatli o'chirildi");
    }
}
