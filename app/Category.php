<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    public function products()
    {
    	return $this->hasMany('App\Product', 'id', 'category_id');
    }
}
