<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'img_url','price','owner_id','tag_id', 'quantity'
    ];

    public function orders(){
        return $this->belongsToMany(Order::class,'product_orders','product_id')->withPivot(['quantity']);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id');
    }
}
