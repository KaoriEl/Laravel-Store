<?php

namespace App;
use App\Size;
Use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function  images(){
    return $this->hasMany('App\ProductImage');
    }

    public function  category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

}
