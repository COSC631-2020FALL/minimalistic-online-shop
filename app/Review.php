<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * returns the user who created this review
     */
    public function review_owner(){
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function for_product() {
        return $this->belongsTo(Product::class,'product_id');
    }

}
