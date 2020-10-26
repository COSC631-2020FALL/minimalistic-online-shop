<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function orders(){
        return $this->hasMany(Order::class, 'user_id');
    }


    public function products(){
        return $this->hasMany(Product::class, 'owner_id');
    }

    /**
     * Returns all of this users past reviews
     */
    public function reviews(){
        return $this->hasMany(Review::class, 'reviewer_id');
    }
    /**
     * Return the user's cart
     */
    public function cart() {
        return $this->hasOne(Cart::class);
    }

}
