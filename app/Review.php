<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'rating','review','product_id','reviewer_id'
    ];
    /**
     * returns the user who created this review
     */
    public function review_owner() {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function for_product() {
        return $this->belongsTo(Product::class,'product_id');
    }

}
