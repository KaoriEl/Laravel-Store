<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //вызов вьюшки и передача параметров
    public  function index(){
        return view('home.index',[
            'products'=>Product::select(['created_at','title','price', 'id', 'updated_at', 'in_stock', 'description', 'new_price', 'category_id'])->latest()->take(8)->get(),
            'SellProductOne'=>Product::orderBy('new_price')->where('new_price', '>', '100')->where('in_stock', true)->take(1)->get(),
             'LowPrice'=>Product::orderBy('price')->where('in_stock', true)->take(1)->get()
        ]);
    }
    //вызов странички контактов
    public function contact(){
        return view('contact.contact');
    }


}
