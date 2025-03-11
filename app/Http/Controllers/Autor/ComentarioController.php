<?php

namespace App\Http\Controllers\Autor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Comentario;

class ComentarioController extends Controller
{
    //
    public function index(){

        $posts = Auth::user()->posts;

        return view('autor.comentario', compact('posts'));
    }

    public function destroy($id){
        

        $comentario = Comentario::findorfail($id);

        if($comentario->post->user->id == Auth::id()){
            $comentario->delete();
            
            Toastr::success('Comentario eliminado Correctamente', 'Success');
        }else{
            Toastr::error('No autorizado para eliminar este comentario :(', 'Acceso denegado');
        }
        return redirect()->back();

    }
}
