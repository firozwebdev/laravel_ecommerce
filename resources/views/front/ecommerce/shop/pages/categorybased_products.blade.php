@extends('front.ecommerce.shop.shop_layout')
@section('shop_content')
    <div class="col-md-9">
        <div class="filter-section clearfix">
            <div class="top-left-filter">
                <div class="filter-group">
                    <label>Short by : </label>
                    <select id="short-by" class="selectpicker show-tick form-control myfilter_by_select">
                        <option>Choose...</option>
                        <option value="Regular">Regular</option>
                        <option value="Featured">Featured</option>
                        <option value="Special">Special</option>
                        <option value="best_sale">Best Sale</option>
                        <option  value="mostly_viewed">Mostly Viewed</option>
                        <option>Popular</option>
                        <option>New</option>

                    </select>
                </div>
                <div class="filter-group">
                    <ul class="list-inline view-options">

                        <li><a href="{{ route('shop.list.view') }}"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="top-right-filter">
                <div class="filter-group">
                    <label>Show :</label>
                    <select id="show-items" class="selectpicker show-tick form-control">
                        <option>9</option>
                        <option>12</option>
                        <option selected>15</option>
                        <option>18</option>
                        <option>24</option>
                        <option>30</option>
                    </select>
                </div>
                <div class="filter-group">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <div class="product-list">
            <div class="row" id="shop_box_product">

                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-box">
                            <div class="img"><img src="{{ asset('front_assets/upload/'. $product->product_image)  }}" alt="" /></div>
                            <div class="product-detail">
                                <div class="name"><strong>Antique Gold - </strong>{!!  str_limit($product->product_title,15)  !!}</div>
                                <div class="rating">
                                    <a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="search-page.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>
                                    <a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
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
            </div>
        </div>
        {{ $products->links() }}


    </div>

@endsection

