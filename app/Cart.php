<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public function user() {
         return $this->belongsTo(User::class);
    }


    public function order(){
	 return $this->belongsTo(Order::class);
    }

}
