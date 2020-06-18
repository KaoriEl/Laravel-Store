@extends('layouts.main')

@section('title','Checkout Your Order')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
@endsection

@section('custom_js')
    <script src="js/contact.js"></script>
    <script src="js/checkout.js"></script>
@endsection

@section('content')
    <!-- Home -->

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(images/download.gif)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{route('index')}}">Home</a></li>
                                        <li><a href="{{route('cart.index')}}">Shopping Cart</a></li>
                                        <li>Checkout</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->

    <div class="checkout">
        <div class="container">
            <div class="row">

                <!-- Billing Info -->
                <div class="col-lg-6">
                    <div class="billing checkout_section">
                        <div class="section_title">Billing Address</div>
                        <div class="section_subtitle">Enter your address info</div>
                        <div class="checkout_form_container">
                            <form action="{{route('create.order')}}" id="checkout_form" class="checkout_form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="checkout_name">First Name*</label>
                                        <input type="text" id="checkout_name" class="checkout_input" required="required" name="add_user_first_name">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="checkout_last_name">Last Name*</label>
                                        <input type="text" id="checkout_last_name" class="checkout_input" required="required" name="add_user_last_name">
                                    </div>
                                </div>
                                <div>
                                    <!-- Company -->
                                    <label for="checkout_company">Company</label>
                                    <input type="text" id="checkout_company" class="checkout_input" name="add_user_company">
                                </div>
                                <div>
                                    <!-- Country -->
                                    <label for="checkout_country">Country*</label>
                                    <input type="text" id="checkout_contry" class="checkout_input" required="required" name="add_user_county">
                                </div>
                                <div>
                                    <!-- Address -->
                                    <label for="checkout_address">Address*</label>
                                    <input type="text" id="checkout_address" class="checkout_input" required="required" name="add_user_address">
                                </div>
                                <div>
                                    <!-- Zipcode -->
                                    <label for="checkout_zipcode">Zipcode*</label>
                                    <input type="text" id="checkout_zipcode" class="checkout_input" required="required" name="add_user_zipcode">
                                </div>
                                <div>
                                    <!-- City / Town -->
                                    <label for="checkout_city">City/Town*</label>
                                    <input type="text" id="checkout_city" class="checkout_input" required="required" name="add_user_city">
                                </div>
                                <div>
                                    <!-- Province -->
                                    <label for="checkout_province">Province*</label>
                                    <input type="text" id="checkout_province" class="checkout_input" required="required" name="add_user_province">
                                </div>
                                <div>
                                    <!-- Phone no -->
                                    <label for="checkout_phone">Phone no*</label>
                                    <input type="phone" id="checkout_phone" class="checkout_input" required="required" name="add_user_phone">
                                </div>
                                <div>
                                    <!-- Email -->
                                    <label for="checkout_email">Email Address*</label>
                                    <input type="phone" id="checkout_email" class="checkout_input" required="required" name="add_user_email">
                                </div>
                                    <input type="hidden" id="checkout_email" class="checkout_input" required="required" value="{{$product = Cart::getTotal()}}" name="add_user_total">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Info -->

                <div class="col-lg-6">
                    <div class="order checkout_section">
                        <div class="section_title">Your order</div>
                        <div class="section_subtitle">Order details</div>

                        <!-- Order details -->
                        <div class="order_list_container">
                            <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Product</div>
                                <div class="order_list_value ml-auto">{{Cart::getTotalQuantity()}}</div>
                            </div>
                            <ul class="order_list">
                                @foreach($data as $product)
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">{{$product->name}} <br> QTY: {{$product->quantity}} </br></div>
                                    <div class="order_list_value ml-auto">${{$product->price}}</div>
                                </li>
                                @endforeach
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Shipping</div>
                                    <div class="order_list_value ml-auto">Free</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Total</div>
                                    <div class="order_list_value ml-auto">{{$product = Cart::getTotal()}}</div>
                                </li>
                            </ul>
                        </div>
                        <!-- Order Text -->
                        <div class="order_text">By making delivery you accept all our terms and conditions and privacy policy</div>

                        <button class="button contact_button" type="submit" form="checkout_form"><span>Place Order</span></button>
{{--                        <div class="button order_button"><a href="#">Place Order</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

