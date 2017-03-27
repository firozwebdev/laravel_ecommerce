@extends('front.ecommerce.layout')
@section('content')
    <!--banner section-->
    @include('front.ecommerce.pages.partials.bannar')
    <div id="content">
        <!-- ****************** Offers Section ****************** -->
        <section class="offers section-block">
            <div class="container">
                <div class="heading"><span>FREE STANDARD SHIPPING ON ORDERS OVER $49</span></div>
                <div class="offers-slider">

                    @foreach($blog_products as $blog_product)
                    <div class="col-md-4">
                        <div class="offer-box">
                            <a href="{{ route('newest.product.detail',['id'=>$blog_product->blog_id]) }}"><img src="{{ asset($blog_product->blog_image) }}" alt="" /></a>
                            <div class="hover-block">
                                <h3>{{ $blog_product->blog_title }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="special-offer">
                    <img src="{{ asset('front_assets/images/offer-img/img14.jpg') }}" alt="" class="img-responsive" />
                    <div class="offer-detail">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Looking for a Special Gift</h2>
                                <p>THE SEASON’S MUST-HAVE GIFTS FOR EVERYONE AND EVERY OCCASION</p>
                                <a href="index.html#" class="btn btn-info">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****************** Upcoming Offers Section	****************** -->
        <section class="upcoming-offers">
            <div class="overlay">
                <div class="black-overlay"></div>
                <div class="container">
                    <div class="detail">
                        <span class="title">UPCOMING</span>
                        <h2><span>christmas</span> CORPORATE COLLECTION</h2>
                        <p>A brand new Christmas Corporate Collection on your way...</p>
                        <a href="index.html#" class="btn btn-detail">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****************** Featured Products Section ****************** -->
        <section class="feature-products section-block">
            <div class="container">
                <div class="heading"><span>Featured Products</span></div>
                <div class="product-list">
                    <div class="row">
                        <div class="product-list general-slider">
                        @if($featured_products)
                            @foreach($featured_products as $f_product)
                                <div class="col-md-3 col-sm-6">
                                    <div class="product-box">
                                        <div class="img"><img src="{{ asset('front_assets/upload/'. $f_product->product_image) }}" alt="" /></div>
                                        <div class="product-detail">
                                            <div class="name"><strong>Antique Gold - </strong>{!!  str_limit($f_product->product_title,15)  !!}</div>
                                            <div class="rating">
                                                <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a href="index.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>
                                                <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="price"><span>$ {{ $f_product->product_price }}</span></div>
                                        </div>
                                        <div class="hover-block">
                                            <ul class="list-inline">
                                                <li><a href="{{ route('ecommerce.product.detail',['id'=>$f_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                                <li><a href="{{ route('save.product.wishlist',['id'=>$f_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                <li><a href="{{ route('ecommerce.product.detail',['id'=>$f_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ****************** Regular Products Section ****************** -->
        <section class="feature-products section-block">
            <div class="container">
                <div class="heading"><span>Regular Products</span></div>
                <div class="product-list">
                    <div class="row">
                        <div class="product-list general-slider">

                            @if($regular_products)
                                @foreach($regular_products as $r_product)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="product-box">
                                            <div class="img"><img src="{{ asset('front_assets/upload/'. $r_product->product_image) }}" alt="" /></div>
                                            <div class="product-detail">
                                                <div class="name"><strong>Antique Gold - </strong>{!!  str_limit($r_product->product_title,15)  !!}</div>
                                                <div class="rating">
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="price"><span>$ {{ $r_product->product_price }}</span></div>
                                            </div>
                                            <div class="hover-block">
                                                <ul class="list-inline">
                                                    <li><a href="{{ route('ecommerce.product.detail',['id'=>$r_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                                    <li><a href="{{ route('save.product.wishlist',['id'=>$r_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="{{ route('ecommerce.product.detail',['id'=>$r_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ****************** Best Sellers Section ****************** -->
        <section class="best-seller section-block">
            <div class="container">
                <div class="heading"><span>Best Seller</span></div>
                <div class="product-list">
                    <div class="row">
                        <div class="product-list general-slider">
                          @if($best_sale)
                           @foreach($best_sale as $products)
                               @foreach($products as $product)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="product-box">
                                            <div class="img"><img src="{{ asset('front_assets/upload/'.$product->product_image) }}" alt="" /></div>
                                            <div class="product-detail">
                                                <div class="name"><strong>Antique Gold - </strong>{!!  str_limit($product->product_title,15)  !!}</div>
                                                <div class="rating">
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="index.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="price"><span>$ {{ $product->product_price }}</span></div>
                                            </div>
                                            <div class="hover-block">
                                                <ul class="list-inline">
                                                    <li><a href="{{ route('ecommerce.product.detail',['id'=>$product->id]) }}" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                                    <li><a href="{{ route('save.product.wishlist',['id'=>$product->id]) }}" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="{{ route('ecommerce.product.detail',['id'=>$product->id]) }}" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                           @endforeach
                            @endif

                    </div>
                    </div>
                </div>
            </div>
        </section>





        <!-- ****************** Our Brands Section ****************** -->
        <section class="our-brands section-block">
            <div class="container">
                <div class="heading"><span>Our Brand</span></div>
                <div class="brands-slider">
                    <div><img src="{{ asset('front_assets/images/brand-img/brand1.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand2.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand3.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand4.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand5.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand6.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand7.jpg') }}" alt="" /></div>
                    <div><img src="{{ asset('front_assets/images/brand-img/brand8.jpg') }}" alt="" /></div>
                </div>
            </div>
        </section>
        <!-- ****************** New Arrivals Section ****************** -->
        <section class="new-arrivals section-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="index.html#"><img src="{{ asset('front_assets/images/img15.jpg') }}" alt="" /></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="index.html#"><img src="{{ asset('front_assets/images/img16.jpg') }}" alt="" /></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="index.html#"><img src="{{ asset('front_assets/images/img17.jpg') }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ****************** Our Customer  Section ****************** -->
        <section class="our-customers section-block">
            <div class="container">
                <div class="heading"><span>Customers love our chocolates</span></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="cust-info">
                                    <span class="icon"><i class="fa fa-gift" aria-hidden="true"></i></span>
                                    <p><span class="counter">200</span> Orders Per Day </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cust-info">
                                    <span class="icon"><i class="fa fa-users " aria-hidden="true"></i></span>
                                    <p><span class="counter">35000</span> Customers </p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="cust-info">
                                    <span class="icon"><i class="fa fa-trophy" aria-hidden="true"></i></span>
                                    <p><span class="counter">15</span> Awards</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="client-slider">
                            <div>
                                <div class="client-feedback">
                                    <div class="client-img"><img src="{{ asset('front_assets/images/user-img.jpg') }}" alt="" /></div>
                                    <div class="detail">
                                        <h4>John Doe</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the ...</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="client-feedback">
                                    <div class="client-img"><img src="{{ asset('front_assets/images/user-img.jpg') }}" alt="" /></div>
                                    <div class="detail">
                                        <h4>John Doe</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the ...</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="client-feedback">
                                    <div class="client-img"><img src="{{ asset('front_assets/images/user-img.jpg') }}" alt="" /></div>
                                    <div class="detail">
                                        <h4>John Doe</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the ...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection