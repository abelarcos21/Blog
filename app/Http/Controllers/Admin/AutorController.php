<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\User;

class AutorController extends Controller
{
    public function index(){

        $autores = User::authors()
                 ->withCount('posts')
                 ->withCount('comments')
                 ->get();
        
        return view('admin.autores', compact('autores'));
    }

    public function destroy(User $user){

        // $autor = User::findOrFail($id);
        $user->delete();
        Toastr::success('Autor Eliminado Correctamente', 'Success');
        return redirect()->back();
    }
}
