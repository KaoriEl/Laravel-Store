@extends('layouts.main')

@section('title','Shoping Cart')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
@endsection

@section('custom_js')
    <script src="js/cart.js"></script>
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
                                        <li>Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Info -->
    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">
                @foreach($data as $product)
                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">

                                <div><img src="/images/{{$product->attributes->image}}" alt="image"></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="{{route('showProduct',[$product->attributes->category, $product->name])}}">{{$product->name}}</a></div>
                                <div class="cart_item_edit"><a href="{{url('cart/remove')}}/{{$product->id}}">Delete</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        @if($product->attributes->new_price != null)
                            <div class="details_discount">${{$product->attributes->new_price}}</div>
                        @else
                            <div class="details_discount">${{$product->price}}</div>
                        @endif
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                    <span>Qty</span>
                                    <input id="quantity_input" type="text"  value="{{$product->quantity}}">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><a href="{{url('/cart/plus')}}/{{$product->id}}"><i  class="fa fa-chevron-up" aria-hidden="true"></i></a></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><a href="{{url('/cart/minus')}}/{{$product->id}}"><i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total -->
                            <div class="cart_item_total">${{$product->price  * $product->quantity}}</div>
                    </div>
                        @endforeach
                </div>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="{{route('index')}}">Continue shopping</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="{{route('cart.clear')}}">Clear cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">
                    <!-- Delivery -->
                    <div class="delivery">
                        <div class="section_title">Shipping method</div>
                        <div class="section_subtitle">Select the one you want</div>
                        <div class="delivery_options">
                            <label class="delivery_option clearfix">Personal pickup
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                                <span class="delivery_price">Free</span>
                            </label>
                        </div>
                    </div>

                    <div class="coupon">
                        <div class="section_title"></div>
                                <div class="section_subtitle"></div>
                                <div class="coupon_form_container">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Subtotal</div>

                                    <div class="cart_total_value ml-auto">{{$product = Cart::getSubTotal()}}</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Shipping</div>
                                    <div class="cart_total_value ml-auto">Free</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">{{$product = Cart::getTotal()}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="{{route('checkout.page')}}">Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

