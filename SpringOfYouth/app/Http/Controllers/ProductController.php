<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductSize;
use App\Size;
use App\SizeProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Показ странички продукта по id
    public function show($cat_alias,$product_title){

        return view('product.show',[
            'item'=>Product::where('title',$product_title)->first(),
             'products'=>Product::select(
                 ['created_at',
                     'title',
                     'price',
                     'id',
                     'updated_at',
                     'in_stock',
                     'description',
                     'new_price',
                     'category_id'])
                 ->latest()
                 ->take(4)
                 ->get(),


            ]);
    }
    //Вывод категорий с заданием переменной для показа товаров из этой категории
    public function showCategory($cat_alias){
        return view('сategories.index',[
        'cat' => Category::where('alias',$cat_alias)->first()
        ]);
    }
}
