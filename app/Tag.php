<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tag_name'
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_tags', 'tag_id');
    }
}
