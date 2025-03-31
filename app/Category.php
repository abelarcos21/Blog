<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //metodo eloquent url amigables

    public function getRouteKeyName()
    {
        return 'url';
    }

    //una ctegoria puede tener muchos posts

    public function posts(){

        return $this->hasMany(Post::class);
    }

    // public function setAttribute($name){

    //     // $this->attributes['name'] = $name;
    //     // $this->attributes['url'] = str_slug($name);
        
    // }

    public function setNameAttribute($name){

        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
