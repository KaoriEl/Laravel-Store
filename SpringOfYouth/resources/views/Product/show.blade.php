@extends('layouts.main')

@section('title',$item->title)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/product.css">
    <link rel="stylesheet" type="text/css" href="/styles/product_responsive.css">
@endsection

@section('custom_js')
    <script src="/js/product.js"></script>
@endsection

@section('content')
    <!-- Home -->

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/images/{{$item->category['img']}})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$item->category['title']}}<span>.</span></div>
                                <div class="home_text"><p>{!! $item->category['desc']!!}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        @php
                            $image='';
                              if (count($item->images) > 0){
                                  $image = $item->images[0]['img'];
                              }
                              else{
                                  $image = 'no_image.png';
                              }
                        @endphp
                        <div class="details_image_large"><img src="/images/{{$image}}" alt="{{$item->title}}"><div class="product_extra product_new"><a href="{{route('showCategory', $item->category['alias'])}}">{{$item->category['title']}}</a></div></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                        @if($image=='no_image.png')
                        @else
                        @foreach($item->images as $img)
                                @if($loop->first)
                                    <div class="details_image_thumbnail active" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->title}}"></div>
                                @else
                                    <div class="details_image_thumbnail" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->title}}"></div>
                                @endif
                         @endforeach
                        @endif
                        </div>
                    </div>
                </div>
                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$item->title}}</div>
                        @if($item->sell != null)
                            <div class="details_discount">${{$item->price}}</div>
                            <div class="details_price">${{$item->sell}}</div>
                        @else
                            <div class="details_price">${{$item->price}}</div>
                        @endif


                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                            @if($item->in_stock)
                                <span>In Stock</span>
                            @else
                                <span style="color: red">Not available</span>
                            @endif
                        </div>
                        <div class="details_text">
                            <p>{!!$item->description!!}</p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                                <span>size</span>
                                <select class="button cart_button" name="sizes">
                                    @foreach($item->sizes as $size)
                                        <option value="sizes" name="sizes">{{$size->size}}</option>
                                    @endforeach
                                </select>
                            @if($item->new_price != null)
                            <div class="button cart_button"><a href="{{route('cart.add.discount',$item->id)}}">Add to cart</a></div>
                            @else
                                <div class="button cart_button"><a href="{{url('/cart/add/')}}/{{$item->id}}">Add to cart</a></div>
                            @endif
                        </div>

                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Description</div>
                    </div>
                    <div class="description_text">
                        <p>{!!$item->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
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
                            <div class="product_image"><img src="/images/{{$image}}" alt=""></div>
                            <div class="product_extra product_new"><a href="categories.html">{{$product->category['title']}}</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="product.html">{{$product->title}}</a></div>
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
@endsection

