<?php

namespace App\Http\Controllers\Admin;

use App\{Category,Post,Tag};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    //
    public function index(){

        $posts = Post::latest()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request){

        $this->validate($request, [

            'title' => 'required'

        ]);

        // $post = Post::create([
        //     'title' => $request->get('title'),
        //     'url' => str_slug($request->get('url'))
        // ]);

        $post = Post::create($request->only('title'));

        return redirect()->route('admin.posts.edit', compact('post'));

    }

    public function edit(Post $post){
       
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    public function update(Request $request, Post $post){

        // dd($request);

        $this->validate($request,[

            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $post->title = $request->get('title');

        // if($request->hasFile('image')){

        //     if(!Storage::disk('public')->exists('post')){

        //         Storage::disk('public')->makeDirectory('post');
        //     }

        // $posts = Storage::disk('public')
        //         ->putFileAs('post', $request->image, uniqid().str_replace(' ', '-', $request->image->getClientOriginalName()));
        //     $post->image = 'storage/' . $posts;

            
        // }

        // if(isset($request->image)){  //PARA GUARDAR FOTO EN LA BD

        //     $posts = Storage::disk('public')
        //         ->putFileAs('post', $request->image, uniqid().str_replace(' ', '-', $request->image->getClientOriginalName()));
        //     $post->image = 'storage/' . $posts;
        // }

        if($request->hasFile('image')){

            $post->image = $request->file('image')->store('post');

        }

        $post->user_id = Auth::id();
        $post->body = $request->get('body');

        if(isset($request->status)){

            $post->status = true;
            
        }else{

            $post->status = false;
        }
        $post->is_approved = true;

        $post->category_id = $request->get('category');
        $post->category_id = Str::slug($request->get('category'));
        $post->save();

        //guardar la etiqueta
        $post->tags()->sync($request->get('tags'));

        Toastr::success('post guardado correctamente', 'Success');
        return redirect()->route('admin.posts.index');

    }

    public function destroy(Post $post){


        if(Storage::disk('public')->exists('post/' . $post->image)){

            Storage::disk('public')->delete('post/' . $post->image);
        }

        // $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post eliminado correctamente', 'Success');
        return redirect()->route('admin.posts.index');

    }

    public function pendiente(){
        $posts = Post::where('is_approved', false)->get();
        return view('admin.postspendientes', compact('posts'));
    }

    public function aprovado(){

    }

    
}
