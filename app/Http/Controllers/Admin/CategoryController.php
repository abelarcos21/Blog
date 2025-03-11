<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Storage;

class CategoryController extends Controller
{
    //
    public function index(){

        $categories = Category::latest()->get();

        return view('admin.categorias.index', compact('categories'));
    }

    public function create(){

        return view('admin.categorias.create');
    }

    public function store(Request $request){

        
        //dd($request->all());
        $this->validate($request,[
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'

        ]);

        $category = new Category;
        $category->name = $request->get('name');
        
        $category->url = str_slug($request->get('name'));

        if($request->hasFile('image')){

            if(!Storage::disk('public')->exists('category')){

                Storage::disk('public')->makeDirectory('category');
            }

            if(isset($request->image)){  //PARA GUARDAR FOTO EN LA BD

                $categories = Storage::disk('public')
                    ->putFileAs('category', $request->image, uniqid().str_replace(' ', '-', $request->image->getClientOriginalName()));
                $category->image = 'storage/' . $categories;
            }
        }
    
        $category->save();
        Toastr::success('Categoria creada correctamente', 'Success');
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category){

        return view('admin.categorias.edit', compact('category'));

    }


    public function update( Request $request, Category $category){

        $this->validate($request, [

            'name' => 'required|unique:categories',
            'image' => 'nullable|mimes:jpeg,bmp,png,jpg'

        ]);


        $category->name = $request->get('name');
        $category->url = str_slug($request->get('name'));

        if(isset($request->image)){  //PARA GUARDAR FOTO EN LA BD

            $categories = Storage::disk('public')
                ->putFileAs('category', $request->image, uniqid().str_replace(' ', '-', $request->image->getClientOriginalName()));
            $category->image = 'storage/' . $categories;
        }

        $category->save();
        Toastr::success('categoria actualizada correctamente', 'Success');
        return redirect()->route('admin.category.index');


    }

    public function destroy(Category $category){

        if(Storage::disk('public')->exists('category/' . $category->image) ){

            Storage::disk('public')->delete('category/' . $category->image);

        }

        $category->delete();
        Toastr::success('Categoria eliminada correctamente', 'Success');
        return redirect()->back();
    }
    
}
