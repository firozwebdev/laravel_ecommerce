@extends('front.ecommerce.layout')
@section('content')
    <div id="content" class="extra_margin">
        <!-- ****************** Breadcrumb Section	****************** -->
        <!--<div class="breadcrumb-section">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="my-dashboard.html">All Pages</a></li>
                    <li class="active">My Account</li>
                </ol>
            </div>
        </div>-->

        <section class="inner-content">
            <div class="container">
                <div class="heading"><span>My Dashboard</span></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="quick-links">
                                <h4 class="title">Settings</h4>
                                <ul class="list-unstyled">
                                    <li class="active"><a href="{{ route('customer.personal.info') }}">Personal Information</a></li>

                                    <li><a href="{{ route('customer.billing.address') }}">Billing Address</a></li>
                                    <li><a href="{{ route('customer.shipping.address') }}">Shipping Address</a></li>
                                    <?php
                                        $notifications = \App\Notification::where('customer_id',Session::get('customer_id'))->where('notification_status',0)->get();
                                        $data = [];
                                    ?>
                                        @foreach($notifications as $notification)
                                            <?php
                                                $data[] = $notification;
                                            ?>
                                        @endforeach
                                       <?php
                                            $notification_count = count($data);

                                        ?>

                                    <li><a href="{{ route('customer.notifications') }}">Notifications <span class="badge">{{ $notification_count  }}</span></a></li>

                                </ul>
                            </div>
                            <div class="quick-links">
                                <h4 class="title">Orders</h4>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('customer.orders')}}">My Orders</a></li>
                                    <li><a href="my-dashboard.html#">Order History</a></li>
                                </ul>
                            </div>
                            <div class="quick-links">
                                <h4 class="title">My Stuff</h4>
                                <ul class="list-unstyled">

                                    <li><a href="{{ route('show.wishlist') }}">My Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- ****************** My Dashboard Section	****************** -->
                    @yield('customer_content')
                    </div>
                </div>
            </div>
        </section>


    </div>


@endsection