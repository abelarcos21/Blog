<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function show(Category $category){

        return view('categorias.category', [

            'posts' => $category->posts()->approved()->published()->paginate(2),
            'category' => $category

        ]);

    }
}
