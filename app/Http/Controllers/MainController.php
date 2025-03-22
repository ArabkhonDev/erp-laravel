<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function dashboard(){
        $posts = Post::orderBy("created_at","desc")->cursorPaginate(10);
        return redirect()->route('posts.index', compact('posts')) ;
    }

    public function about(){
        return view('about');
    }

    public function courseIndex(){
        $courses = Course::orderBy('created_at','desc')->cursorPaginate(3);
        return view('pages.kurslar.index', compact('courses'));
    }

    public function courseShow(Course $course){
        dd($course);
        return view('pages.kurslar.show', compact('course'));
    }

    public function news(){
        $posts = Post::orderBy('created_at','desc')->cursorPaginate(3);
        return view('pages.posts.index', compact('posts'));
    }

    public function newsShow(Post $post){
        dd($post);
        return view('pages.posts.show', compact('post'));
    }

    public function contact(){
        return view('contact');
    }
}
