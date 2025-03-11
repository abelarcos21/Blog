<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function search(Request $request){

        $query = $request->get('query');
        $posts = Post::where('title', 'like', "%$query%")->get();
        return view('search', compact('query', 'posts'));
    }
}
