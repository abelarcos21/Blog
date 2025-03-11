<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Session;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    //
    public function show(Post $post){

        
        $postsrandom = Post::published()->take(3)->inRandomOrder()->get();

        $view_count = 'blog_' . $post->id; //mostrar las vistas de cada post

        if(!Session::has($view_count)){

            $post->increment('view_count');
            Session::put($view_count, 1);
        }

        $categories = Category::all();

        return view('posts.postdetails', compact('post', 'postsrandom', 'categories'));
        
    }

   
}
