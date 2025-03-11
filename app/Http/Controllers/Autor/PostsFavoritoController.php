<?php

namespace App\Http\Controllers\Autor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsFavoritoController extends Controller
{
    //
    public function index(){
        $posts = Auth::user()->favorite_posts;
        return view('autor.favorito', compact('posts'));
    }



    
}
