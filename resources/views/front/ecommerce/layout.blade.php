<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="format-detection" content = "telephone=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chocalate</title>

    <!-- favicon icon -->
    <link rel="icon" href="{{ asset('front_assets/images/favicon.ico ')}}">
    <!-- Ioons -->
    <link href="{{ asset('front_assets/css/font-awesome.min.css') }}" rel="stylesheet"> <!-- font-awesome.min css -->

    <!-- CSS Stylesheet -->
    <link href="{{ asset('front_assets/css/bootstrap.min.css') }}" rel="stylesheet"> <!-- bootstrap.min css -->
    <link href="{{ asset('front_assets/css/bootstrap-select.css') }}" rel="stylesheet"> <!-- bootstrap.min css -->
    <link href="{{ asset('front_assets/css/nouislider.min.css') }}" rel="stylesheet"> <!-- bootstrap.min css -->

    <link href="{{ asset('front_assets/css/slick.css') }}" rel="stylesheet"> <!-- slick css -->
    <link href="{{ asset('front_assets/css/slick-theme.css') }}" rel="stylesheet"> <!-- slick-theme css -->
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet"> <!-- style css -->
    <link href="{{ asset('front_assets/css/css3.css') }}" rel="stylesheet"> <!-- css3 style -->

    <!--[if lt IE 9]>
    <link href="{{ asset('front_assets/css/ie8.css') }}" rel="stylesheet">
    <![endif]-->
    <!-- HTML5 shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js') }}/1.4.2/respond.min.js'"></script>
    <![endif]-->
   <!-- <script>
        $("body").bind("ajaxSend", function(elm, xhr, s){
            if (s.type == "POST") {
                xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
            }
        });
    </script>-->

    <style>
        .extra_margin{
            margin-top: 180px;;
        }
        p.text-danger{
            color: #a94442 !important;
            font-weight: bold !important;
            font-size:12px !important;
        }
    </style>
</head>

<body onload="select_province_by_country()">

<div id="wrapper">

    <!-- ****************** Header  Section ****************** -->
    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="header-top-left">

                            <span>Call us at +1800-621-3294 (M-F 9AM-5PM EST)</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="header-top-right">
                            <ul class="list-inline">
                                <li class="searchBox">
                                    <a href="javascript:void(0);" class="search-boxSmall"><i class="fa fa-search"></i>Search</a>
                                    <div class="search-box">
                                        <div class="icon"><i class="icon icon-search"></i></div>
                                        <div class="search-view">
                                            <input type="text" value="" placeholder="Enter a search term …" />
                                            <button type="submit" value=""><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </li>
                                @if(Session::has('customer_id'))
                                <li><a href="{{ route('show.wishlist') }}"><i class="fa fa-heart-o" aria-hidden="true"></i>My Wishlist</a></li>
                                @endif
                                <li><a href="{{ route('shop.box.view') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Shop</a></li>
                                <li><a href="{{ route('show.cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a></li>
                                @if(Session::has('customer_id'))

                                    <li><a href="{{ route('customer.personal.info') }}"><i class="fa fa-user" aria-hidden="true"></i>Welcome  Mr. {{ Session::get('last_name') }}</a></li>

                                    <li><a href="{{ route('customer.logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>


                                    <li class="cart-items">
                                        <?php $cart_items = Cart::count(); ?>
                                        <a href="javascript:void(0);" class="cart-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="badge">{{ $cart_items }}</span></a>
                                        <div class="cart-table">
                                            <table class="table">
                                                <tbody>
                                                <?php $contents = Cart::content();?>
                                                @foreach($contents as $content)

                                                    <tr>
                                                        <td>
                                                            <img style="width:82px;height:82px;" src="{{ asset('front_assets/upload/'.$content->options->image) }}" alt="" />
                                                        </td>
                                                        <td>
                                                            <p class="name">{{ $content->name }}</p>
                                                            <div class="price">$ {{ $content->price }}</div>
                                                            <form action="{{ route('cart.quantity.update') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <input  type="hidden" value="{{ $content->rowid }}" name="rowid">
                                                                <div class="qty"><input type="text" name="cart_quantity" value="{{ $content->qty }}" />
                                                                    <input type="submit" class="btn btn-info" value="Update">
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td class="options text-right">

                                                            <span><a href="{{ route('remove.cart.item',['id'=>$content->rowid]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                                </tbody>
                                            </table>
                                            <div class="total">
                                                <label>TOTAL:</label>
                                                <span class="price">$ {{ Cart::total() }}</span>
                                            </div>
                                            <div class="checkout">

                                                @if(Session::has('customer_id'))
                                                    @if(Session::has('billing_id'))
                                                        <a href="{{ route('checkout.user') }}" class="btn btn-info btn-block">Checkout</a>
                                                    @endif
                                                @endif
                                                <a href="{{ route('show.cart') }}" class="btn btn-primary btn-block">View cart</a>
                                            </div>
                                        </div>
                                    </li>

                                @else
                                    <li><a href="{{ route('customer.login') }}"><i class="fa fa-user" aria-hidden="true"></i>Login/Register</a></li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('front_assets/images/logo.png') }}" alt="Logo" /></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('shop.box.view') }}">Shopping<span>Center</span></a></li>
                        <li><a href="{{ route('newest.product.list') }}">Newest<span>Products</span></a></li>
                        <li class="has-child"><a href="search-page.html">Chocolate<span>Categories</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>
                                        <?php $categories = App\Ecategory::all()?>
                                        @foreach($categories as $category)

                                        <li><a href="{{ route('category.wise.product',['id'=>$category->id]) }}">{{ $category->category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <ul class="hidden-xs">
                                        <li class="occasion-offer">
                                            <label>Christmas Special Chocolate</label>
                                            <img src="{{ asset('front_assets/images/img18.jpg') }}" alt="" />
                                            <a href="index.html#" class="send-gift">Send Christmas Chocolate Gift</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-child"><a href="search-page.html">Chocolate<span>Occasions</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>
                                        <?php $occasions = App\Occasion::all()?>
                                        @foreach($occasions as $occasion)

                                            <li><a href="{{ route('occasion.wise.product',['id'=>$occasion->id]) }}">{{ $occasion->occasion_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <ul class="hidden-xs">
                                        <li class="occasion-offer">
                                            <label>Christmas Special Chocolate</label>
                                            <img src="{{ asset('front_assets/images/img18.jpg') }}" alt="" />
                                            <a href="index.html#" class="send-gift">Send Christmas Chocolate Gift</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-child last"><a href="search-page.html">All<span>Pages</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="{{ route('newest.product.list') }}">Newest Product List</a></li>
                                        <li><a href="{{ route('about.us') }}">About Us</a></li>
                                        <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                                        <li><a href="{{ route('404') }}">404 Page Note Found</a></li>
                                    </ul>
                                    <ul>

                                        <li><a href="{{ route('shipping.information') }}">Shipping Information</a></li>
                                        @if(Session::has('customer_id'))
                                            <li><a href="{{ route('customer.personal.info') }}">My Dashboard</a></li>
                                            <li><a href="{{ route('show.wishlist') }}">My Wishlist</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- ****************** Banner Section	****************** -->

   @yield('content')
    <!-- ****************** Footer Section ****************** -->
    <footer id="footer">
        <div class="container">
            <div class="top-footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>CONTACTS</h4>
                                <address>
                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>1344 Franklee Lane, Eagleville<br>Pennsylvania NY - 01403</p>
                                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:letters@chocolate.com">letters@chocolate.com</a></p>
                                    <p><i class="fa fa-comment-o" aria-hidden="true"></i><a href="index.html#">Live Chat</a></p>
                                </address>
                            </div>
                            <div class="col-sm-6">
                                <h4>BUSINESS ACCOUNTS</h4>
                                <ul class="list-unstyled">
                                    <li><a href="index.html#">Business Account Request</a></li>
                                    <li><a href="index.html#">Business Email Order Form </a></li>
                                    <li><a href="index.html#">Business Fax Order Form</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>CUSTOMER SERVICE</h4>
                                <ul class="list-unstyled">
                                    <li><a href="index.html#">Order Tracking</a></li>
                                    <li><a href="shipping-info.html">Shipping Info</a></li>
                                    <li><a href="index.html#">Return Policy</a></li>
                                    <li><a href="index.html#">Check Gift Card Balance</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <h4>NEWS AND UPDATES</h4>
                                <ul class="list-unstyled">
                                    <li><a href="index.html#">Catalog Subscribe</a></li>
                                    <li><a href="index.html#">Catalog Unsubscribe</a></li>
                                    <li><a href="index.html#">Email Preferences</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-letter">
                            <h4>Get the latest</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email address">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                        <h4>CONNECT WITH US</h4>
                        <ul class="list-inline social-links">
                            <li><a href="index.html#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="index.html#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="index.html#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="index.html#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="index.html#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="index.html#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">&copy;<span class="year">2016</span> chocolate.com. All rights reserved</span>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-inline">
                            <li><a href="index.html#">Sitemap</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="index.html#">Privacy Policy</a></li>
                            <li><a href="index.html#">Terms & Conditions</a></li>
                            <li><a href="blog-left-sidebar.html">Blog</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>

<!-- JavaScript files -->
<script src="{{ asset('front_assets/js/jquery-1.12.4.min.js') }}"></script> <!-- jquery-1.12.4.min js-->
<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script> <!-- bootstrap.min js-->
<script src="{{ asset('front_assets/js/bootstrap-select.min.js') }}"></script> <!-- bootstrap.min js-->
<script src="{{ asset('front_assets/js/wNumb.js') }}"></script> <!-- bootstrap.min js-->
<script src="{{ asset('front_assets/js/nouislider.min.js') }}"></script> <!-- bootstrap.min js-->
<script src="{{ asset('front_assets/js/slick.min.js') }}"></script> <!-- slick slider js-->
<script src="{{ asset('front_assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.counterup.min.js') }}"></script><!-- counter js -->
<script src="{{ asset('front_assets/js/custom.js') }}"></script> <!-- custom js-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="{{ asset('front_assets/js/map-cstomize.js') }}" type="text/javascript"></script><!-- map js-->

<!--product details page add and minus beside add to cart button-->

<script>
    $(document).ready(function(){
         i=1;
        $('#add_button').click(function(e){
            e.preventDefault;
            i++;
            $('#cart_quantity').val(i);

        });
        $('#minus_button').click(function(e){
            e.preventDefault;
            i--;
            if(i<=0){
               i=1;
            }else{
                $('#cart_quantity').val(i);

            }

        });
    });
</script>

<!--<script>

    $(document).ready(function(){

        $('.cart_qty_0').on('click',function(){
            var token = '{{ csrf_token() }}';
            var cart_quantity = $(".cart_quantity_0").val();
            var product_id = $(".product_id_0").val();
            var process = " {{ route('cart.quantity.update') }} ";
            var data = {
                "_token":token,
                "product_quantity":cart_quantity,
                "product_id" :product_id
            }

            $.post(process, data, function(result){
                console.log(result);
            });
        });

        $('.cart_qty_1').on('click',function(){
            var token = '{{ csrf_token() }}';
            var cart_quantity = $(".cart_quantity_1").val();
            var product_id = $(".product_id_1").val();
            var process = " {{ route('cart.quantity.update') }} ";
            var data = {
                "_token":token,
                "cart_input":cart_quantity,
                "product_id" :product_id
            }

            $.post(process, data, function(result){
                console.log(result);
            });
        });





    });
</script>-->

<script>
    $(document).ready(function(){
        $('#check_email').blur(function(){
            var token = '{{ csrf_token() }}';
            var email_address = $('#check_email').val();
            var process = " {{ route('email.check') }} ";

            var data = {
                "_token":token,
                "email_address":email_address
            }

            $.post(process, data, function(result){
                console.log(result);
            });
        });
    });
</script>

<script>

    //price range slider in shopping page.
    function rangeSlider(){
        if ($("#keypress").length){
            var keypressSlider = document.getElementById('keypress');
            var input0 = document.getElementById('input-with-keypress-0');
            var input1 = document.getElementById('input-with-keypress-1');
            var inputs = [input0, input1];
            noUiSlider.create(keypressSlider, {
                start: [ 5, 100 ],
                connect: true,
                tooltips: [
                    wNumb({
                        decimals: 1,
                        postfix: ' ($)'
                    }),
                    wNumb({
                        decimals:1,
                        postfix: ' ($)'
                    })
                ],
                range: {
                    'min': 0,
                    'max': 100
                },
                format: wNumb({
                    decimals: 1,

                }),

            });

            keypressSlider.noUiSlider.on('update', function( values, handle ) {
                inputs[handle].value = values[handle];




                var min = $('#input-with-keypress-0').val();
                var max = $('#input-with-keypress-1').val();
                var category_id = "{{ Session::get('category_id') }}";
                var token = "{{ csrf_token() }}";

                if( min !=false && max !=false && category_id==false){

                    console.log('i am first');
                    var process = "{{ route('shop.price.slider') }}";

                    var data = {
                        "_token":token,
                        "min":min,
                        "max":max,
                    }
                    if(min >5 && max <= 100){
                        get_products(process,data);
                    }
                }


                if(category_id !=false){
                    var process = "{{ route('shop.pricewithcategory.slider') }}";

                    var data = {
                        "_token":token,
                        "min":min,
                        "max":max,
                    }
                    if(min >5 && max <= 100){
                        get_products(process,data);

                    }
                }



                //

            });

            function setSliderHandle(i, value) {
                var r = [null,null];
                r[i] = value;
                keypressSlider.noUiSlider.set(r);
            }

            // Listen to keydown events on the input field.
            inputs.forEach(function(input, handle) {

                input.addEventListener('change', function(){
                    setSliderHandle(handle, this.value);
                });

                input.addEventListener('keydown', function( e ) {

                    var values = keypressSlider.noUiSlider.get();
                    var value = Number(values[handle]);



                    // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
                    var steps = keypressSlider.noUiSlider.steps();

                    // [down, up]
                    var step = steps[handle];

                    var position;

                    // 13 is enter,
                    // 38 is key up,
                    // 40 is key down.
                    switch ( e.which ) {

                        case 13:
                            setSliderHandle(handle, this.value);
                            break;

                        case 38:

                            // Get step to go increase slider value (up)
                            position = step[1];

                            // false = no step is set
                            if ( position === false ) {
                                position = 1;
                            }

                            // null = edge of slider
                            if ( position !== null ) {
                                setSliderHandle(handle, value + position);
                            }

                            break;

                        case 40:

                            position = step[0];

                            if ( position === false ) {
                                position = 1;
                            }

                            if ( position !== null ) {
                                setSliderHandle(handle, value - position);
                            }

                            break;
                    }
                });
            });

        }
    }
</script>






<script>

    //filterer by sort by in shopping page.....
    $(document).ready(function(){
        $('#short-by').change(function(){
            $('.pagination').html('');
            var option_value = $('#short-by').val();
            var token = '{{ csrf_token() }}';
            var process = " {{ route('short.by.filter') }} ";

            var data = {
                "_token":token,
                "option_value":option_value
            }

            if(option_value=='best_sale'){
                get_products_by_multi_array(process,data);
            }else{
                get_products(process,data);
            }

        });
        //filterer by sort by shopping product display number in shopping page.....
        $('#show-items').change(function(){
            $('.pagination').html('');
            var option_value = $('#show-items').val();
            var token = '{{ csrf_token() }}';
            var process = " {{ route('short.by.items') }} ";

            var data = {
                "_token":token,
                "option_value":option_value
            }

            get_products(process,data);
        });

        //filterer by sort by search in shopping page.....

        $('#search_product').on('keyup',function(){
            //$('.pagination').html('');
            var search_product_name = $('#search_product').val();
            if(search_product_name.length > 0){
                var token = '{{ csrf_token() }}';
                var process = " {{ route('search.product') }} ";

                var data = {
                    "_token":token,
                    "search_product_name":search_product_name
                }
                get_products_by_single_array(process,data);
            }
        });
    });





    function get_products(process,data){
        $.post(process, data, function(result){


            var data = '';
            if (typeof result[0][0] == 'undefined') {   //if response data is one dimensional

                console.log(result);
                jQuery.each( result, function( i, val ) {

                    var product_link = '/product-details/'+val.id;


                    data += '<div class="col-md-4 col-sm-6">';
                    data += '<div class="product-box">';
                    data += '<div class="img"><img src="http://localhost:8000/front_assets/upload/'+ val.product_image +'" alt="" /></div>';
                    data += '<div class="product-detail">';
                    data += '<div class="name"><strong>Antique Gold - </strong>'+ val.product_title.slice(0, 15)+' ..</div>';
                    data += '<div class="rating">';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '</div>';
                    data += '<div class="price"><span>$ '+ val.product_price+'</span></div>';
                    data += '</div>';
                    data += '<div class="hover-block">';
                    data += '<ul class="list-inline">';
                    data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>';
                    data += '<li><a href="/wishlist-product/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>';
                    data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
                    data += '</ul>';
                    data += '</div>';
                    data += '</div>';
                    data += '</div>';
                });
                if(result){
                    $('#shop_box_product').html(data);
                }
            }else{
                //if response data is two dimensional


                console.log(result);
                $.each(result, function(i, value) {
                    $.each(value, function(key, val) {


                        //console.log(val);
                        var product_link = '/product-details/'+val.id;


                        data += '<div class="col-md-4 col-sm-6">';
                        data += '<div class="product-box">';
                        data += '<div class="img"><img src="http://localhost:8000/front_assets/upload/'+ val.product_image +'" alt="" /></div>';
                        data += '<div class="product-detail">';
                        data += '<div class="name"><strong>Antique Gold - </strong>'+ val.product_title.slice(0, 15)+' ..</div>';
                        data += '<div class="rating">';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '</div>';
                        data += '<div class="price"><span>$ '+ val.product_price+'</span></div>';
                        data += '</div>';
                        data += '<div class="hover-block">';
                        data += '<ul class="list-inline">';
                        data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>';
                        data += '<li><a href="/wishlist-product/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>';
                        data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
                        data += '</ul>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                    });

                    if(result){
                        $('#shop_box_product').html(data);
                    }
                });
            }




        });
    }

    //single array with products

    function get_products_by_single_array(process,data){
        $.post(process, data, function(result){


            var data = '';
              //if response data is one dimensional

                console.log(result);
                jQuery.each( result.searched_products.data, function( i, val ) {

                    var product_link = '/product-details/'+val.id;


                    data += '<div class="col-md-4 col-sm-6">';
                    data += '<div class="product-box">';
                    data += '<div class="img"><img src="http://localhost:8000/front_assets/upload/'+ val.product_image +'" alt="" /></div>';
                    data += '<div class="product-detail">';
                    data += '<div class="name"><strong>Antique Gold - </strong>'+ val.product_title.slice(0, 15)+' ..</div>';
                    data += '<div class="rating">';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                    data += '</div>';
                    data += '<div class="price"><span>$ '+ val.product_price+'</span></div>';
                    data += '</div>';
                    data += '<div class="hover-block">';
                    data += '<ul class="list-inline">';
                    data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>';
                    data += '<li><a href="/wishlist-product/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>';
                    data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
                    data += '</ul>';
                    data += '</div>';
                    data += '</div>';
                    data += '</div>';
                });
                if(result){
                    $('#shop_box_product').html(data);
                    //$('.pagination').html(result['pagination'])
                }





        });
    }

    function get_products_by_multi_array(process,data){
        $.post(process, data, function(result){


            var data = '';

                //if response data is two dimensional


                console.log(result);
                $.each(result, function(i, value) {
                    $.each(value, function(key, val) {


                        //console.log(val);
                        var product_link = '/product-details/'+val.id;


                        data += '<div class="col-md-4 col-sm-6">';
                        data += '<div class="product-box">';
                        data += '<div class="img"><img src="http://localhost:8000/front_assets/upload/'+ val.product_image +'" alt="" /></div>';
                        data += '<div class="product-detail">';
                        data += '<div class="name"><strong>Antique Gold - </strong>'+ val.product_title.slice(0, 15)+' ..</div>';
                        data += '<div class="rating">';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star-half-full" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '<a href="search-page.html#"><i class="fa fa-star" aria-hidden="true"></i></a>';
                        data += '</div>';
                        data += '<div class="price"><span>$ '+ val.product_price+'</span></div>';
                        data += '</div>';
                        data += '<div class="hover-block">';
                        data += '<ul class="list-inline">';
                        data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>';
                        data += '<li><a href="/wishlist-product/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>';
                        data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
                        data += '</ul>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                    });

                    if(result){
                        $('#shop_box_product').html(data);
                    }
                });





        });
    }

</script>



<!--<script type="text/javascript" src="{{URL::to('front_assets/js/country.js')}}"></script>
<script language="javascript">
   $(document).ready(function(){
       populateCountries("country", "state");
       // populateCountries("country2");
   });
</script>-->





<script>
    $(document).ready(function(){
        $('.select_country').on('change',function(){
            console.log('clicked');
            var token = '{{ csrf_token() }}';
            var process = " {{ route('select.provinces.on.change.country') }} ";
            var country_code = $('.select_country').val();
            console.log(country_code);
            var data = {
                "_token":token,
                "country_code":country_code
            }
            $.post(process, data, function(result){
                console.log(result);
                var data = '';
                $.each(result, function(i, val) {
                    data += '<option>'+ val.province_name +'</option>';
                });
                $('.select_province').html(data);
            });
        });

    });
</script>

<script>

    function select_province_by_country(){

        var token = '{{ csrf_token() }}';
        var process = " {{ route('select.province.by.country') }} ";
        var country_code = $('.select_country').val();


        var customer_id = "<?php if(Session::has('customer_id')) { echo Session::get('customer_id');}else{ return null; } ?>";

        //console.log(customer_id);

        if(country_code && customer_id) {
            var data = {
                "_token":token,
                "country_code":country_code,
                "customer_id":customer_id
            }
            $.post(process, data, function(result){
                console.log(result);
                var data = '';
                $.each(result.province, function(i, val) {
                    if(result.province_from_billing_address.city===val.province_name){
                        data += '<option selected>'+ val.province_name +'</option>';
                    }
                    if(result.province_from_shipping_address.city===val.province_name){
                        data += '<option selected>'+ val.province_name +'</option>';
                    }
                    data += '<option>'+ val.province_name +'</option>';
                });
                $('.select_province').html(data);
            });
        }


    }

</script>

</body>
</html>
