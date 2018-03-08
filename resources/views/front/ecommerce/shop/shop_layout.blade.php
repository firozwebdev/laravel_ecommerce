@extends('front.ecommerce.layout')
@section('content')
<div id="content">
    <!-- ****************** Breadcrumb Section	****************** -->
    <div class="breadcrumb-section">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Chocolate Combos</li>
            </ol>
        </div>
    </div>
    <!-- ****************** Discount Banner Section	****************** -->
    <section style="margin-top:150px;">
        <div class="container">
            <div class="discount-banner">
                <h1>25%</h1>
                <p>Special Discount</p>
                <a href="search-page.html#" class="btn btn-default">Shop Now</a>
            </div>
        </div>
    </section>
    <section class="list-page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="filter-list">
                            <h4>Search Product</h4>
                            <div class="check-list">
                                <input type="text" id="search_product" name="search_product" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="filter-list">
                            <h4>Price selector</h4>
                            <div class="check-list price-selector">
                                <div id="keypress"></div>

                                <input type="text" id="input-with-keypress-0" class="form-control">
                                <input type="text" id="input-with-keypress-1" class="form-control">
                            </div>
                        </div>
                        <div class="filter-list">
                            <h4>Chocolate Categories</h4>
                            <div class="check-list">
                                <ul class="choclate-categories">


                                    <!--<li class="has-child"><a href="javascript:void(0);">Cacao <span>(4)</span></a>
                                        <ul class="cat-list">
                                            <li><a href="search-page.html#">Cacao Nibs</a></li>
                                            <li><a href="search-page.html#">Raw Cacao</a></li>
                                            <li><a href="search-page.html#">Roasted Cacao</a></li>
                                            <li><a href="search-page.html#">Ground Cacao</a></li>
                                        </ul>
                                    </li>-->
                                    <?php

                                        $cagegories = App\Ecategory::all();
                                    ?>
                                    @foreach( $cagegories as $category)
                                        <li><a href="{{ route('category.wise.product',['id'=>$category->id]) }}">{{ $category->category_name }} <span>(
                                                    <?php
                                                        $products_no = App\Eproduct::where('ecategory_id',$category->id)->get()->count();
                                                    ?>

                                                    {{ $products_no }}
                                                    )</span></a></li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>
                        <div class="filter-list">
                            <h4>Occasions</h4>
                            <div class="check-list">
                                <ul class="choclate-categories">



                                    <?php

                                    $occasions = App\Occasion::with('eproducts')->get();


                                    ?>
                                    @foreach( $occasions as $occasion)
                                        <li><a href="{{ route('occasion.wise.product',['id'=>$occasion->id]) }}">{{ $occasion->occasion_name }} <span>(
                                                    <?php
                                                    $products_no = App\Eproduct::where('occasion_id',$occasion->id)->get()->count();
                                                    ?>

                                                    {{ $products_no }}
                                                    )</span></a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                @yield('shop_content') <!--shop content-->
            </div>
        </div>
    </section>


</div>


@endsection