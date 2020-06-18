@extends('layouts.main')

@section('title','Home')

@section('content')

    <!-- Home -->

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/download.gif)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Spring</div>
                                        <div class="home_slider_subtitle">It all begins when you open up the shoebox.</div>
                                        <div class="button button_light home_button"><a href="{{route('login')}}">Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_3.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Of</div>
                                        <div class="home_slider_subtitle">Enjoy every step! Feel the weightlessness on earth!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_2.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                         <div class="home_slider_title">Youth.</div>
                                        <div class="home_slider_subtitle">Conquering the urban jungle.</div>
                                        <div class="button button_light home_button"><a href="#">Contact</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <li class="home_slider_custom_dot active">01.</li>
                                    <li class="home_slider_custom_dot">02.</li>
                                    <li class="home_slider_custom_dot">03.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Ads -->

    <div class="avds">
        <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
            @foreach($SellProductOne as $product)
                @php
                    $image='';
                      if (count($product->images) > 0){
                          $image = $product->images[0]['img'];
                      }
                      else{
                          $image = 'no_image.png';
                      }
                @endphp
            <div class="avds_small">
                <div class="avds_background" style="background-image:url(images/{{$image}})"></div>
                <div class="avds_small_inner">
                    <div class="avds_large_content">
                        <div class="avds_title">{{$product->category['title']}}</div>
                        <div class="avds_link"><font color="black"><a href="{{route('showProduct',[$product->category['alias'], $product->title])}}"> {{$product->title}} </a> </font></div>
                    </div>
                    <div class="avds_discount_container">
                        <img src="images/discount.png" alt="">
                        <div>
                            <div class="avds_discount">
                                <div>${{$product->new_price}}</div>
                                <div style="text-decoration: line-through">${{$product->price}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                @foreach($LowPrice as $product)
                    @php
                        $image='';
                          if (count($product->images) > 0){
                              $image = $product->images[0]['img'];
                          }
                          else{
                              $image = 'no_image.png';
                          }
                    @endphp
            <div class="avds_large">
                <div class="avds_background" style="background-image:url(images/{{$image}})"></div>
                <div class="avds_large_container">
                    <div class="avds_large_content">
                        <div class="avds_title">{{$product->category['title']}}</div>
                        <div class="avds_link avds_link_large"><a href="{{route('showProduct',[$product->category['alias'], $product->title])}}"> {{$product->title}} </a></div>
                    </div>
                    <div class="avds_discount_container">
                        <img src="images/discount.png" alt="">
                        <div>
                            <div class="avds_discount">
                                <div>${{$product->price}}</div>
                                <div>The lowest price</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        <!-- Product -->
                        @foreach($products as $product)
                            @php
                                $image='';
                                  if (count($product->images) > 0){
                                      $image = $product->images[0]['img'];
                                  }
                                  else{
                                      $image = 'no_image.png';
                                  }
                            @endphp
                        <div class="product">
                            <div class="product_image"><img src="/images/{{$image}}" alt="{{$product->title}}"></div>
                            <div class="product_extra product_new"><a href="{{route('showCategory', $product->category['alias'])}}">{{$product->category['title']}}</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="{{route('showProduct',[$product->category['alias'], $product->title])}}">{{$product->title}}</a></div>
                                @if($product->new_price != null)
                                        <div style="text-decoration: line-through">${{$product->price}}</div>
                                        <div class="product_price">${{$product->new_price}}</div>
                                    @else
                                        <div class="product_price">${{$product->price}}</div>
                                    @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ad -->
    <div class="avds_xl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="avds_xl_container clearfix">
                        <div class="avds_xl_background" style="background-image:url(images/SneakersCategory.jpg)"></div>
                        <div class="avds_xl_content">
                            <div class="avds_title">Best sneakers</div>
                            <div class="avds_text">Only in our store, the best at the best prices!</div>
                            <div class="avds_link avds_xl_link"><a href="{{route('showCategory', $product->category['alias'])}}"> Buy Sneakers </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                        <div class="icon_box_title">Free Shipping Worldwide</div>
                        <div class="icon_box_text">
                            <p>We work directly with delivery services, thanks to this we can afford to provide you with free delivery to all regions</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                        <div class="icon_box_title">Free Returns</div>
                        <div class="icon_box_text">
                            <p>If the product didn’t suit you, you can send it back to us using mail, we will bear all the costs of mailing.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>An agent of our support service will instantly answer all your questions, you can find the email address in the "Contacts" section</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
