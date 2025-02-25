<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'img_url','price','owner_id','tag_id', 'quantity', 'category_id'
    ];

    public function orders(){
        return $this->belongsToMany(Order::class,'product_orders','product_id')->withPivot(['quantity','price']);
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

	public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
