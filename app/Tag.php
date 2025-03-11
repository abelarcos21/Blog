<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Tag extends Model
{

    //url amigable
    public function getRouteKeyName(){
        return 'url';
    }

    //un tag puede tener muchos posts
    public function posts(){

        return $this->belongsToMany(Post::class)->withTimestamps();
    }
    
    //uso de un mutador
    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}
