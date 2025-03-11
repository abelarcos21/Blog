<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'posts'], function(){
        Route::get('', 'PostsController@index')->name('admin.posts.index');
        Route::get('create', 'PostsController@create')->name('admin.posts.create');
        Route::post('create', 'PostsController@store')->name('posts.store');
        Route::get('editar/{post}', 'PostsController@edit')->name('admin.posts.edit');
        Route::put('editar/{post}', 'PostsController@update')->name('admin.posts.update');
        Route::delete('eliminar/{post}', 'PostsController@destroy')->name('admin.posts.destroy');
    }); 

    Route::group(['prefix' => 'categorias'], function(){
        Route::get('', 'CategoryController@index')->name('admin.category.index');
        Route::get('create', 'CategoryController@create')->name('admin.category.create');
        Route::post('create', 'CategoryController@store')->name('admin.category.store');
        Route::get('editar/{category}', 'CategoryController@edit')->name('admin.category.edit');
        Route::put('editar/{category}', 'CategoryController@update')->name('admin.category.update');
        Route::delete('eliminar/{category}', 'CategoryController@destroy')->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'etiquetas'], function(){
        Route::get('', 'EtiquetaController@index')->name('admin.tag.index');
        Route::get('create', 'EtiquetaController@create')->name('admin.tag.create');
        Route::post('create', 'EtiquetaController@store')->name('admin.tag.store');
        Route::get('editar/{tag}', 'EtiquetaController@edit')->name('admin.tag.edit');
        Route::put('editar/{tag}', 'EtiquetaController@update')->name('admin.tag.update');
        Route::delete('eliminar/{tag}', 'EtiquetaController@destroy')->name('admin.tag.destroy');

    });

    Route::group(['prefix' => 'configuracion'], function(){
        Route::get('', 'ConfiguracionController@index')->name('admin.configuracion');
        Route::put('perfil-actualizar', 'ConfiguracionController@updateProfile')->name('admin.perfil.update');
        Route::put('contraseña-actualizar', 'ConfiguracionController@updatePassword')->name('admin.password.update');

    });

    Route::group(['prefix' => 'autores'], function(){
        Route::get('', 'AutorController@index')->name('admin.autor.index');
        Route::delete('eliminar/{user}', 'AutorController@destroy')->name('admin.autor.destroy');

    });

    Route::group(['prefix' => 'comentarios'], function(){
        Route::get('', 'ComentarioController@index')->name('admin.comentario.index');
        Route::delete('eliminar/{comentario}', 'ComentarioController@destroy')->name('admin.comentario.destroy');

    });

    Route::group(['prefix' => 'postsfavoritos'], function(){
        Route::get('', 'PostFavoritoController@index')->name('admin.postfavorito.index');
    });

    Route::group(['prefix' => 'postspendientes'], function(){
        Route::get('', 'PostsController@aprovado')->name('admin.postpendiente.index');
    });

});

Route::group(['prefix' => 'autor', 'namespace' => 'Autor', 'middleware' => ['auth', 'autor']], function(){

    // Route::get('/', 'AutorController@index')->name('dashboard');
    Route::get('dashboard','AutorController@index')->name('autor.dashboard');

    Route::group(['prefix' => 'posts'], function(){
        Route::get('create', 'PostsController@create')->name('autor.posts.create');
        Route::post('create', 'PostsController@store')->name('autor.posts.store');
        Route::get('editar/{post}', 'PostsController@edit')->name('autor.posts.edit');
        Route::put('editar/{post}', 'PostsController@update')->name('autor.posts.update');
    });

    Route::group(['prefix' => 'comentarios'], function(){
        Route::get('', 'ComentarioController@index')->name('comentario.index');
        Route::delete('comentarios/{id}', 'ComentarioController@destroy')->name('comentario.destroy');
    });

    Route::group(['prefix' => 'configuracion'], function(){
        Route::get('configuracion', 'ConfiguracionController@index')->name('configuracion');
        Route::put('perfil-actualizar', 'ConfiguracionController@updateProfile')->name('autor.perfil.update');
        Route::put('contraseña-actualizar', 'ConfiguracionController@updatePassword')->name('autor.password.update');
    });

    Route::get('favorito', 'PostsFavoritoController@index')->name('posts.favorito');

});

Route::group(['middleware' => 'auth'], function(){

    Route::post('favorito/{post}/agregar', 'FavoritoController@agregar')->name('post.favorito');
    Route::post('comentario/{post}', 'ComentarioController@store')->name('comentario.store');

});

View::composer('layouts.frontend.partial.footer', function($view){

    $categories = \Cache::rememberForever('categories', function() {
        return \App\Category::all();
    });

    $view->with('categories', $categories);

});



Route::get('/', 'PagesController@home')->name('home');

Route::get('blog/{post}', 'PostsController@show')->name('posts.show');//mostrar los posts individuales

Route::get('/categorias/{category}', 'CategoryController@show')->name('category.show');//mostrar las categorias individuales

Route::get('/etiquetas/{tag}', 'TagController@show')->name('tag.show'); //mostrar las etiquetas individuales

Route::get('search', 'SearchController@search')->name('posts.search');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}

// Password Reset Routes...
if ($options['reset'] ?? true) {
    Route::resetPassword();
}

// Email Verification Routes...
if ($options['verify'] ?? false) {
    Route::emailVerification();
}






