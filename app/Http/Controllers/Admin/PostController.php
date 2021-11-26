<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:manage-posts');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required|in:text,photo',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:1024',
            'content' => 'nullable',
            'published' => 'boolean',
            'premium' => 'boolean',
        ]);

        //$data = Arr::add($data, 'date', now());
        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;


        };

        //dd($data);
        $post = Post::create($data);

        session()->flash('message', 'Post has been added!');

        return redirect(route('posts.single', $post->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $oldImage = $post->image;

        $data = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required|in:text,photo',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:1024',
            'content' => 'nullable',
            'published' => 'boolean',
            'premium' => 'boolean',
        ]);

        //$data = Arr::add($data, 'date', now());
        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;


        };
        //dd($data);
        $post->update($data);

        if (isset($data['image'])){
            Storage::delete($oldImage);
        }

        return redirect(route('posts.single', $post->slug))->with('message', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        Storage::delete($post->image);

        return redirect(url('/'))->with('message', 'Post has been deleted!');
    }
}
