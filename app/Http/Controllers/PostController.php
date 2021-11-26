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

        $posts = Post::published()->latest('date')->paginate(3);

        return view('pages.posts', compact('posts'));
    }

    public function show($slug){

        $post = Post::published()->whereSlug($slug)->firstOrFail();

        return view('pages.post', compact('post'));
    }
}
