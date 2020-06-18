<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }


    protected $table = 'sizes';
}
