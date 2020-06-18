<?php

namespace App;

use Darryldecode\Cart\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function insertform(){
        return back();
    }

        public static function createOrder(){
        $order = Order::orderBy('id', 'desc')->first();

        //place order and inset data to orders products
            foreach (\Cart::getContent() as $cartData){
                $order->products()->attach($cartData->id, [
                    'total' =>$cartData->quantity * $cartData->price,
                        'qty' => $cartData->quantity

                ]);
            }

            \Cart::clear();
        }


    protected $table = 'orders';
}
