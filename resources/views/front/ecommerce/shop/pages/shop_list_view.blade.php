@extends('front.ecommerce.shop.shop_layout')
@section('shop_content')
    <div class="col-md-9">
        <div class="filter-section clearfix">
            <div class="top-left-filter">
                <div class="filter-group">
                    <label>Short by : </label>
                    <select id="short-by" class="selectpicker show-tick form-control">
                        <option>Popular</option>
                        <option>New</option>
                        <option>Mostly Viewed</option>
                    </select>
                </div>
                <div class="filter-group">
                    <ul class="list-inline view-options">
                        <li><a href="{{ route('shop.box.view') }}"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>

                    </ul>
                </div>
            </div>
            <div class="top-right-filter">
                <div class="filter-group">
                    <label>Show :</label>
                    <select id="show-items" class="selectpicker show-tick form-control">
                        <option>12</option>
                        <option>15</option>
                        <option>20</option>
                    </select>
                </div>
                <div class="filter-group">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <div class="product-list-view">
            @foreach($products as $product)
                <div class="product-wrapper">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="product-box">
                            <div class="img">
                                <img src="{{ asset('front_assets/upload/'. $product->product_image)  }}" alt="" class="img-responsive">
                            </div>
                            <div class="hover-block">
                                <ul class="list-inline">
                                    <li><a href="{{ route('ecommerce.product.detail',['id'=>$product->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                    <li><a href="{{ route('save.product.wishlist',['id'=>$product->id]) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="{{ route('ecommerce.product.detail',['id'=>$product->id]) }}" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="product-detail">
                            <div class="name"><strong>Antique Gold - </strong>{!!  str_limit($product->product_title,15)  !!}</div>
                            <p>{!!  str_limit($product->product_description,25)  !!} ...</p>
                            <div class="rating">
                                <a href="list-view.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="list-view.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="list-view.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>
                                <a href="list-view.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                <a href="list-view.html#"><i class="fa fa-star" aria-hidden="true"></i></a>
                            </div>
                            <div class="price"><span>$ {{ $product->product_price }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                {{ $products->links() }}
        </div>
    </div>

@endsection


