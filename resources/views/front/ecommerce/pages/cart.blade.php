@extends('front.ecommerce.pages.cart)
@section('content')
    <div id="content">
        <!-- ****************** Breadcrumb Section	****************** -->
        <div class="breadcrumb-section">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Cart</li>
                </ol>
            </div>
        </div>

        <section class="inner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- ****************** My Cart Section	****************** -->
                        <div class="my-cart">
                            <div class="table-responsive product-table">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-left">Product</th>
                                        <th>qty</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="thead">Product</div>
                                            <div class="prod-desc">
                                                <div class="prod-img">
                                                    <img src="assets/images/product-img/img1.jpg" alt="">
                                                </div>
                                                <div class="prod-info">
                                                    <div class="name"><strong>Antique Gold</strong> - Chocolate bar with and 14 Milk Chocolates</div>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...</p>
                                                    <div><a href="cart.html#" class="btn-link">Remove</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="thead">qty</div>
                                            <div class="quantity-input">
                                                <input value="1" type="text">
                                                <div class="minus"><i class="fa fa-minus"></i></div>
                                                <div class="plush"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </td>
                                        <td><div class="thead">Price</div><div>$ 449.0</div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="thead">Product</div>
                                            <div class="prod-desc">
                                                <div class="prod-img">
                                                    <img src="assets/images/product-img/img4.jpg" alt="">
                                                </div>
                                                <div class="prod-info">
                                                    <div class="name"><strong>Antique Gold</strong> - Chocolate bar with and 14 Milk Chocolates</div>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...</p>
                                                    <div><a href="cart.html#" class="btn-link">Remove</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="thead">qty</div>
                                            <div class="quantity-input">
                                                <input value="1" type="text">
                                                <div class="minus"><i class="fa fa-minus"></i></div>
                                                <div class="plush"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </td>
                                        <td><div class="thead">Price</div><div>$ 359.2</div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="thead">Product</div>
                                            <div class="prod-desc">
                                                <div class="prod-img">
                                                    <img src="assets/images/product-img/img3.jpg" alt="">
                                                </div>
                                                <div class="prod-info">
                                                    <div class="name"><strong>Antique Gold</strong> - Chocolate bar with and 14 Milk Chocolates</div>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...</p>
                                                    <div><a href="cart.html#" class="btn-link">Remove</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="thead">qty</div>
                                            <div class="quantity-input">
                                                <input value="1" type="text">
                                                <div class="minus"><i class="fa fa-minus"></i></div>
                                                <div class="plush"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </td>
                                        <td><div class="thead">Price</div><div>$ 449.0</div></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-info clearfix">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="note">Delivery and payment options can be selected later</div>
                                        <div class="descount-input" style="display: block;">
                                            <input placeholder="Promo code" type="text" class="form-control">
                                            <input value="Apply" type="submit" class="btn btn-info">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="cart-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="title">Subtotal</td>
                                                    <td>$ 1257.2</td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Shipping &amp; Handling (Free Shipping - Free)</td>
                                                    <td>$ 0.0</td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Tax</td>
                                                    <td>$ 26.55</td>
                                                </tr>
                                                <tr class="total">
                                                    <td class="title">Grand Total</td>
                                                    <td>$ 1283.75</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix links-btn">
                                <a href="search-page.html" class="btn btn-info btn-large"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;&nbsp;Continue Shopping</a>
                                <a href="checkout.html" class="btn btn-info btn-large pull-right">Checkout&nbsp;&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
                                            <li><a href="cart.html#">premium gift box</a></li>
                                            <li><a href="cart.html#">greeting card</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h3>Giving a gift?</h3>
                                        <img src="assets/images/gift-box.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div>
                                        <h3>Giving a gift?</h3>
                                        <p>You can add additional gift options upon checkout</p>
                                        <ul class="list-unstyled">
                                            <li><a href="cart.html#">premium gift box</a></li>
                                            <li><a href="cart.html#">greeting card</a></li>
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