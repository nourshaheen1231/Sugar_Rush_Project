<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use Searchable;
    protected $guarded=[];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function toSearchableArray()
{
    return [
        'name' => $this->name,
    ];
}

public function favourites()  {
    return $this->hasMany(Favorite::class);
}
}
