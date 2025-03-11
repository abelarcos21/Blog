<?php

namespace App\Http\Controllers;

use App\Comentario;
// use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, $post){

        $this->validate($request, [

            'comment' => 'required'

        ]);

        $coment = new Comentario;
        $coment->post_id = $post;
        $coment->user_id = Auth::id();
        $coment->comment = $request->get('comment');
        $coment->save();
        
        Toastr::success('comentario publicado correctamente', 'Success');
        return redirect()->back();
    }
}
