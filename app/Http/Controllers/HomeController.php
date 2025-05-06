<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::get();
        $posts = Post::when(request('category_id'), function($query){
            $query->where('category_id', request('category_id'));
        })
        ->latest()
        ->get();
        return view('home', compact('categories', 'posts'));
    }

    public function show(Post $post){
        return view("post", compact("post"));
    }
}
