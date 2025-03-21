<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainControler extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function dashboard(){
        $posts = Post::orderBy("created_at","desc")->cursorPaginate(10);
        return redirect()->route('posts.index', compact('posts')) ;
    }
}
