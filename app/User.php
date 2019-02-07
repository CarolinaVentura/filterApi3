<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use  Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'profile_image'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class)->withTimestamps();
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('feedback', 'fav')->withTimestamps();
    }

    public function favourites(){
        return $this->belongsToMany(Product::class,'fav_user')->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

}
