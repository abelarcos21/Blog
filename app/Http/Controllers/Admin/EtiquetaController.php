<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;

class EtiquetaController extends Controller
{
    public function index(){
        $tags = Tag::latest()->get();
        return view('admin.etiquetas.index', compact('tags'));
    }

    public function create(){
        return view('admin.etiquetas.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required'

        ]);

        $tag = new Tag;
        $tag->name = $request->get('name');
        $tag->save();
        Toastr::Success('Etiqueta creada correctamente', 'Success');
        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag){

        return view('admin.etiquetas.edit', compact('tag'));

    }

    public function update(Request $request, Tag $tag){

        $tag->name = $request->get('name');
        $tag->save();
        Toastr::Success('Etiqueta Actualizadan Correctamente', 'Success');
        return redirect()->route('admin.tag.index');
    }

    public function destroy(Tag $tag){

        $tag->delete();
        Toastr::Success('Etiqueta Eliminada Correctamente', 'Success');
        return redirect()->route('admin.tag.index');

    }
}
