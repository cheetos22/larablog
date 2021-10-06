<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('verified')->only('show');
    // }

    public function index(){

        $posts = Post::latest('date')->paginate(3);

        return view('pages.posts', compact('posts'));
    }

    public function show(Post $post){

        return view('pages.post', compact('post'));
    }
}
