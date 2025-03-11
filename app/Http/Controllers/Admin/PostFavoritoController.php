<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PostFavoritoController extends Controller
{
    public function index(){
        $posts = Auth::user()->favorite_posts;
        return view('admin.postsfavoritos', compact('posts'));
    }
    
}
