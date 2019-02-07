<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];


    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
