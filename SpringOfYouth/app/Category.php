<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Устанавливаем связь 1 ко многим с продуктами
    public function  products(){
        return $this->hasMany('App\Product');
    }
}
