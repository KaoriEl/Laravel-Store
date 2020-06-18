<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function insertform(){
        return back();
    }
    public static function addOrder(Request $request){
        Order::insertGetId([
            'created_at' => date('Y-m-d-h-m-s'),
            'updated_at' => date('Y-m-d-h-m-s'),
            'first_name' => $request->input('add_user_first_name'),
            'last_name' => $request->input('add_user_last_name'),
            'phone' => $request->input('add_user_phone'),
            'company' => $request->input('add_user_company'),
            'address_street' => $request->input('add_user_address'),
            'country' => $request->input('add_user_county'),
            'zipcode' => $request->input('add_user_zipcode'),
            'city_town' => $request->input('add_user_city'),
            'province' => $request->input('add_user_province'),
            'email' => $request->input('add_user_email'),
            'total' => $request->input('add_user_total'),

        ]);
        return redirect('/checkout/ordercreate');
    }
}
