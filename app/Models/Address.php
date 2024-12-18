<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Address::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Address::class, 'parent_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
