@extends('front.ecommerce.customer.customer_dashboard_layout')

@section('customer_content')
    <div class="dashboard">
        <h3>Your Order Details are diplayed here.......</h3>
        <table class="table table-bordered table-hover">
            <tr class="">
                <th>Order No.</th>
                <th>Order Total</th>
                <th>Order Status</th>
                <th>Date</th>
            </tr>
            <?php $i=1; ?>
            @foreach($order_info as $order)
                <tr>
                    <td>{{ $i}}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->order_status }}</td>

                    <td> {{ Carbon\Carbon::parse($order->created_at)->format(' j F ') }}</td>
                    <!--format('l j F Y'); // Monday 4 July 2016-->

                </tr>
                <?php $i++ ;?>
            @endforeach

        </table>
    </div>

@endsection


