<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_orders','order_id');
    }
}
