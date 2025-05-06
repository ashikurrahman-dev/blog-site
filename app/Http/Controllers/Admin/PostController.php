<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest("id")->with("category")->get();
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('img')){
            $imgPath = $request->file('img')->store('posts', 'public');
            $data['img'] = $imgPath;
        }
        Post::create($data);
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            if ($post->img && Storage::disk('public')->exists($post->img)) {
                Storage::disk('public')->delete($post->img);
            }
    
            $data['img'] = $request->file('img')->store('posts', 'public');
        }

        $post->update($data);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->img && Storage::disk('public')->exists($post->img)) {
            Storage::disk('public')->delete($post->img);
        }
        
        $post->delete();
        return redirect()->route('posts.index');
    }
}
