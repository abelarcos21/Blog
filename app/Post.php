<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $guarded = [];

    protected $fillable = ['title', 'url'];


//un post le pertenece aun usuario
    public function user(){

        return $this->belongsTo(User::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function getRouteKeyName(){
        
        return 'url';
    }

    //un post puede tener muchas etiquetas
    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    //posts favoritos de los usuarios
    public function favorite_to_users(){

        return $this->belongsToMany(User::class)->withTimestamps();

    }

    //query scopes
    public function scopeApproved($query){

        return $query->where('is_approved', 1);
    }

    public function scopePublished($query){
        
        return $query->where('status', 1);
    }

    //un post tiene muchos comentarios
    public function comments(){

        return $this->hasMany(Comentario::class);
    }

    public function setTitleAttribute($title){ //Mutador

        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }

    
    //query scopes

    //otra forma de representar un scope utilizando POO(programacion orientado objetos)
    // public static function active(){

    //     return static::where('active', 1);

    // }

    //la forma de utilizarlo
    //$usersActived = User::active()->get();
    
    //tambien podemos encadenar
    //$usersActived = User::active()->where('age', '>', 20)->get();



}
