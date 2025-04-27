<?php

namespace App\Http\Controllers\Autor;

use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Auth::user()->posts()->latest()->get();
        return view('autor.posts.index', compact('posts'));
    }


    public function create(){

        $categories = Category::all();
        $tags = Tag::all();
        return view('autor.posts.create', compact('categories','tags'));
    }

    public function store(Request $request){

        
        $this->validate($request, [

            'title' => 'required'
        ]);

        $post = Post::create($request->only('title'));
        return redirect()->route('autor.posts.edit', compact('post'));

    }

    public function edit(Post $post){

        $categories = Category::all();
        $tags = Tag::all();

        return view('autor.posts.edit', compact('post','categories', 'tags'));

    }

    public function update(Request $request, Post $post){

        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'image' => 'required'
        ]);

        $post->title = $request->get('title');
        if($request->hasFile('image')){

            if(!Storage::disk('public')->exists('post')){
                Storage::disk('public')->makeDirectory('post');

            }

            $img = $request->file('image');
            $file_ruta = $img->getClientOriginalName();
            Storage::disk('public')->put('post/' .$file_ruta, file_get_contents($img->getRealPath() ));
            $post->image = $file_ruta;
        }

        $post->user_id = Auth::id();
        $post->body = $request->get('body');

        if(isset($request->status)){

            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = false;

        $post->category_id = $request->get('category');
        $post->category_id = Str::slug($request->get('category'));
        $post->save();


        //guardar la etiqueta
        $post->tags()->sync($request->get('tags'));

        // $post->category()->sync($request->get('category'));
        // $post->tags()->sync($request->get('tags'));

        Toastr::success('Post Guardado Correctamente', 'Success');
        return redirect()->route('autor.dashboard');
    }

    public function destroy(Post $post){

        if(Storage::disk('public')->exists('posts/' . $post->image)){

            Storage::disk('public')->delete('posts/' .$post->image);

        }
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post Eliminado Corrrectamente', 'Success');
        return redirect()->route('autor.dashboard');
    }

}
