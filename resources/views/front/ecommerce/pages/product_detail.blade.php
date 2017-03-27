@extends('front.ecommerce.layout')
@section('content')
    <div id="content">
        <!-- ****************** Breadcrumb Section	****************** -->
        <div class="breadcrumb-section">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="search-page.html">Chocolate Combos</a></li>
                    <li class="active">Truffle Nut Collection</li>
                </ol>
            </div>
        </div>

        <section class="inner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- ****************** Product Detail Section	****************** -->
                        <div class="product-detail-section">
                            <div class="product-detail">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="product-view">
                                            <div class="product-img">
                                                <img src="{{ asset('front_assets/upload/'.$product->product_image) }}" alt="" />
                                            </div>
                                            <a href="{{ asset('front_assets/upload/'.$product->product_image) }}" class="example-image-link view-btn" data-lightbox="example-1">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="product-info">
                                            <div class="name">Truffle Nut Collection</div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                            <p>We don't use any artificial flavors, all the paste inside the truffle chocolate is made from original dry nuts pulp. You will feel the best combination of chocolate and nuts in these truffles. Just try you will fall in love on the first bite.</p>
                                            <div class="availability">Availability: In stock</div>
                                            <div class="price">$ {{ $product->product_price }}</div>
                                            <div>
                                                {!!Form::open( array('route' =>['add.to.cart'],'method'=>'post',))!!}
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <div class="input-group qty-btn">
                                                        <span class="input-group-btn">

                                                            <a  id="add_button" class="btn btn-default btn-number"  data-type="minus" data-field="quant[1]" >
                                                                <i class="fa fa-caret-up" aria-hidden="true"></i>
                                                            </a>
                                                        </span>
                                                    <input id="cart_quantity" type="text" name="product_quantity" class="form-control input-number" value="1" >
                                                        <span class="input-group-btn">


                                                            <a  id="minus_button" class="btn btn-default btn-number"  data-type="minus" data-field="quant[1]" >
                                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                            </a>
                                                        </span>
                                                </div>

                                                <input type="submit" class="btn btn-info btn-large" value="Add to cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-desc  section-block">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="product-detail.html#description" aria-controls="description" role="tab" data-toggle="tab">Description</a>
                                    </li>
                                    <li role="presentation"><a href="product-detail.html#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ****************** Similar Products Section	****************** -->
                        <div class="similar-products section-block">
                            <div class="heading"><span>Similar Products</span></div>
                            <div class="product-list similar-product-slider">

                                @foreach($similar_products as $similar_product)
                                 <div class="col-md-4 col-sm-6">
                                    <div class="product-box">
                                        <div class="img"><img src="{{ asset('front_assets/upload/'.$similar_product->product_image) }}" alt="" /></div>
                                        <div class="product-detail">
                                            <div class="name"><strong>Antique Gold - </strong>{!!  str_limit($similar_product->product_title,15)  !!}</div>
                                            <div class="rating">
                                                <a href="product-detail.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a href="product-detail.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a href="product-detail.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>
                                                <a href="product-detail.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a href="product-detail.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="price"><span>$ {{ $similar_product->product_price }}</span></div>
                                        </div>
                                        <div class="hover-block">
                                            <ul class="list-inline">
                                                <li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                                <li><a href="my-wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                <li><a href="{{ route('ecommerce.product.detail',['id'=>$similar_product->id]) }}" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="services-list">
                                <div class="service-box">
                                    <div class="icon">
                                        <span><i class="fa fa-truck" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="info">
                                        <h5>Free shipping</h5>
                                        <p>For US orders with subtotal > $40, shipping is on us!</p>
                                    </div>
                                </div>
                                <div class="service-box">
                                    <div class="icon">
                                        <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="info">
                                        <h5>Our promise</h5>
                                        <p>All products are made with the finest ingredients and premium c</p>
                                    </div>
                                </div>
                                <div class="service-box">
                                    <div class="icon">
                                        <span><i class="fa fa-comments" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="info">
                                        <h5>Customer service</h5>
                                        <p>Mon - Fri / 9:00AM - 5:00PM EST 800.123.3254 | info@chocolate.c</p>
                                    </div>
                                </div>
                            </div>
                            <div class="gift-box">
                                <div class="gift-slider">
                                    <div>
                                        <h3>Giving a gift?</h3>
                                        <p>You can add additional gift options upon checkout</p>
                                        <ul class="list-unstyled">
                                            <li><a href="product-detail.html#">premium gift box</a></li>
                                            <li><a href="product-detail.html#">greeting card</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h3>Giving a gift?</h3>
                                        <img src="{{ asset('front_assets/images/gift-box.jpg') }}" alt="" class="img-responsive" />
                                    </div>
                                    <div>
                                        <h3>Giving a gift?</h3>
                                        <p>You can add additional gift options upon checkout</p>
                                        <ul class="list-unstyled">
                                            <li><a href="product-detail.html#">premium gift box</a></li>
                                            <li><a href="product-detail.html#">greeting card</a></li>
                                        </ul>
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