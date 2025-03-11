<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    //
    public function agregar($post){
        
        //verifico que el user esta autenticado
        $user = Auth::user();

        $favorito = $user->favorite_posts()->where('post_id', $post)->count();
        if ($favorito  == 0){
            $user->favorite_posts()->attach($post);
            Toastr::success('post agregado a mi lista de favoritos', 'Success');
            return redirect()->back();
        }else{

            $user->favorite_posts()->dettach($post);
            Toastr::success('post eliminado correctamente', 'Success');
            return redirect()->back();

        }
    }
}
