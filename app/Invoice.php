<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
