@extends('front.ecommerce.layout')
@section('content')
    <div id="content" style="margin-top:150px;">
        <!-- ****************** Breadcrumb Section	****************** -->
        <!--<div class="breadcrumb-section">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="search-page.html">All Pages</a></li>
                    <li><a href="blog-right-sidebar.html">Blogs </a></li>
                    <li class="active">1 Column Right Sidebar</li>
                </ol>
            </div>
        </div>-->

        <section class="inner-content">
            <div class="container">
                <div class="heading"><span>1 Column Right Sidebar</span></div>
                <div class="row">

                   @yield('newest_product_content')
                   <div class="col-md-3">
                        <div class="sidebar">
                            <div class="search-view">
                                <input value="" placeholder="Search" type="text">
                                <button type="submit" value=""><i class="fa fa-search"></i></button>
                            </div>
                            <div class="quick-links">
                                <h4 class="title">Recent Posts</h4>
                                <ul class="list-unstyled">
                                    <?php
                                    $latest_products = DB::table('blog')->take(5)->orderBy('blog_id','desc')->get();

                                    ?>

                                    @foreach($latest_products as $latest_product)
                                        <li><a href="{{ route('newest.product.detail',['id'=>$latest_product->blog_id]) }}">{{ $latest_product->blog_title }} </a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="quick-links">
                                <h4 class="title">Archive</h4>
                                <ul class="list-unstyled">
                                    <li><a href="blog-right-sidebar.html#">October 2016 </a></li>
                                    <li><a href="blog-right-sidebar.html#">September 2016</a></li>
                                </ul>
                            </div>
                            <div class="instagram">
                                <h4 class="title">Others</h4>
                                <ul class="list-unstyled clearfix">
                                    <?php
                                    $products = DB::table('blog')->take(9)->orderBy('blog_id','desc')->get();

                                    ?>
                                    @foreach($products as $product)
                                    <li><a href="{{ route('newest.product.detail',['id'=>$product->blog_id]) }}"><img src="{{ asset($product->blog_image) }}" alt="" /></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tags-list">
                                <h4 class="title">Tags List</h4>
                                <ul class="list-unstyled clearfix">
                                    <?php
                                    $products = DB::table('blog')->take(9)->orderBy('blog_id','desc')->get();

                                    ?>
                                    @foreach($products as $product)
                                            <li><a href="{{ route('newest.product.detail',['id'=>$product->blog_id]) }}">{{ $product->blog_tag }}</a></li>
                                     @endforeach



                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>


@endsection