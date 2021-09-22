<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::latest('date')->get();

        return view('pages.posts', compact('posts'));
    }

    public function show(Post $post){

        return view('pages.post', compact('post'));
    }
}
