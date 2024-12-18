<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()  {
        return $this->belongsTo(User::class);
    }

    public function addess()  {
        return $this->belongsTo(Address::class);
    }


    public function productDetails(){
        return $this->hasMany(ProductDetails::class);
    }

}
