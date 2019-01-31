<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'barcode'
    ];

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
