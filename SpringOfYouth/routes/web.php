<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Cart route
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/add/{id}', 'CartController@addItem')->name('cart.add');
Route::get('/cart/add/discount/{product_id}', 'CartController@addItemWithNewPrice')->name('cart.add.discount');
Route::get('/cart/remove/{id}', 'CartController@removeItem')->name('cart.remove');
Route::get('/cart/clear', 'CartController@CartClear')->name('cart.clear');
Route::get('/cart/minus/{id}', 'CartController@MinusQty')->name('cart.minus');
Route::get('/cart/plus/{id}', 'CartController@PlusQty')->name('cart.plus');

//auth
Auth::routes();


////User order insert
Route::get('/insert/order','OrderController@insertform')->name('insert.order');
Route::post('/create/order','OrderController@addOrder')->name('create.order');

//User message insert
Route::get('/insert/message','UserMessageController@insertform')->name('insert.user');
Route::post('/create/message','UserMessageController@addUserMessage')->name('create.message');

//Subscribe to newsletter
Route::get('/insert','SubscribeNewsletterController@insertform')->name('insert.add');
Route::post('/create','SubscribeNewsletterController@addNewsletter')->name('create.add');

//Index Route
Route::get('/checkout/ordercreate','CartController@checkout')->name('checkout.go');
Route::get('/checkout','CartController@checkoutPage')->name('checkout.page');
Route::get('/contact','IndexController@contact')->name('contact.go');
Route::get('/home', 'IndexController@index')->name('index');
Route::get('/', 'IndexController@index')->name('index');
Route::get('/{cat_alias}', 'ProductController@showCategory')->name('showCategory');
Route::get('/{cat_alias}/{product_title}', 'ProductController@show')->name('showProduct');
Route::get('/insert','SubscribeNewsletterController@insertform')->name('insert.add');







