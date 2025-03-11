<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;
use Brian2694\Toastr\Facades\Toastr;
use Auth;

class ComentarioController extends Controller
{
    public function index(){
        $comentarios = Comentario::latest()->get();
        return view('admin.comentarios', compact('comentarios'));
    }

    public function destroy(Comentario $comentario){
        // $comentario = Comentario::findOrFail($id); //buscar el comentariio por su id que recibimos
        $comentario->delete();
        Toastr::Success('Comentario Eliminado Correctamente', 'Success');
        return redirect()->back();

    }
}
