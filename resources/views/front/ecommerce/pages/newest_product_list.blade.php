@extends('front.ecommerce.newest_product_layout')
@section('newest_product_content')
    <div class="col-md-9">
        <!-- ****************** Blogs Section	****************** -->
        <div class="blogs-list">
            @foreach($newest_product_list as $product)
            <div class="blog">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="blog-img">
                            <img src="{{ asset($product->blog_image) }}" alt="" />
                            <div class="date">{{ Carbon\Carbon::parse($product->created_at)->format(' j F ') }}</div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="blog-detail">
                            <div class="name">{{ $product->blog_title }}</div>
                            <p>{!!  str_limit($product->blog_description,300)  !!}</p>
                            <a href="{{ route('newest.product.detail',['id'=>$product->blog_id]) }}" class="btn-link">Continue Reading  </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="bottom-pagination clearfix">
            {{ $newest_product_list->links() }}
        </div>
    </div>

@endsection