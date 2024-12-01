<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Shop extends Model
{
    use Searchable;
    protected $guarded=[];

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function toSearchableArray()
{
    return [
        'name' => $this->name,
    ];
}


}
