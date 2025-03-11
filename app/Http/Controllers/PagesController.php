<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function home(){

        $categories = Category::all();

        // $posts = Post::latest()->approved()->published()->paginate(5);

        $posts = Post::latest()->approved()->published()->get();

        return view('Pages.home', compact('categories', 'posts'));
    }
}
