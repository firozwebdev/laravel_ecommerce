@extends('front.ecommerce.layout')
@section('content')
    <div id="content"  style="margin-top:170px">

        <section class="inner-content">
            <div class="container">
                <!-- ****************** Checkout Section	****************** -->
                <div class="checkout">
                    <div class="heading"><span>Checkout</span></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="checkout-process">
                                <div class="panel-group" >
                                    @yield('checkout_processing')
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </section>


    </div>

@endsection