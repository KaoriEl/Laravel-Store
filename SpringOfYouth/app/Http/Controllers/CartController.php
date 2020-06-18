<?php

namespace App\Http\Controllers;
use App\ProductImage;
use App\Product;
use App\Category;
use App\ProductSize;
use App\Size;
use App\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
 //Вывод страницы с корзиной и передача в неё данных.
    public function index()  {
        return view('cart.cart',[
        'data' => \Cart::getContent()
        ]);
    }
//Создание заказа
    public function checkout(){

        Order::createOrder();
        return redirect('/');

    }
//Формирует страницу чекаута
    public function checkoutPage(){
        return view('checkout.checkout',[
            'data' => \Cart::getContent()
        ]);
    }

    //Добавление 1го объекта в корзину
    public function addItem($product_id)  {
        $product = Product::find($product_id);
        $size = ProductSize::where('product_id', $product_id)->value('size_id');
        $productimage = ProductImage::where('product_id', $product_id)->value('img');
 \Cart::add(array(
     'id' => $product->id, // inique row ID
     'name' => $product->title,
     'price' => $product->price,
     'quantity' => 1,
     'attributes' => array(
         'new_price' => $product->new_price,
         'image'=>$productimage,
         'category_id' => $product = $product->category_id,
         'category' => Category::where('id', $product)->value('title'),
         'sizes' => $size
     )

 ));
        return back();
    }
//Добавление товара со скидкой.
    public function addItemWithNewPrice($product_id)  {
        $product = Product::find($product_id);
        $productimage = ProductImage::where('product_id', $product_id)->value('img');

        \Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->title,
            'price' => $product->new_price,
            'quantity' => 1,
            'attributes' => array(
                'new_price' => $product->new_price,
                'image'=>$productimage,
                'category_id' => $product = $product->category_id,
                'category' => Category::where('id', $product)->value('title')
            )

        ));
        return back();
    }


    //Полное удаление одного объекта
    public function removeItem($id){
        \Cart::remove($id);
        return back();
    }

    //Очистка
    public function CartClear(){
        \Cart::clear();
        return back();
    }
    //-1 из корзины
    public function MinusQty($id){
        \Cart::update($id, array(
            'quantity' => -1,
        ));
        return back();
    }
    //+1 в корзину
    public function PlusQty($id){
        \Cart::update($id, array(
            'quantity' => 1,
        ));
        return back();
    }



}
