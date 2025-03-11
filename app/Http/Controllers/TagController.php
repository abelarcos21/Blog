<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show(Tag $tag){

        return view('etiquetas.tag', [

            'posts' => $tag->posts()->approved()->published()->paginate(2),
            'tag' => $tag

        ]);

        

    }
}
