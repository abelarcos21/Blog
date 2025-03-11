<?php

namespace App\Http\Controllers\Autor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class AutorController extends Controller
{
    //
    public function index(){

        //verifico usuario autenticado
        $user = Auth::user();
        //guardo los posts de ese usuario en la variable post
        $posts= $user->posts;
        $popular_posts = $user->posts()
                ->withCount('comments')
                ->withCount('favorite_to_users')
                ->orderBy('view_count', 'desc')
                ->orderBy('comments_count')
                ->orderBy('favorite_to_users_count')
                ->take(3)->get();
        
        $total_pending_posts = $posts->where('is_approved', false)->count();

        $all_views = $posts->sum('view_count');

        return view('autor.dashboard', compact('posts','popular_posts','total_pending_posts','all_views'));

    }
}
