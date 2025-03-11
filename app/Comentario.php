<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected  $guarded = [];

    //un comentario le pertenece a un post
    public function post(){

        return $this->belongsTo(Post::class);
    }

    //un comentario le pertenece a un user
    public function user(){

        return $this->belongsTo(User::class);
    }

    
}
