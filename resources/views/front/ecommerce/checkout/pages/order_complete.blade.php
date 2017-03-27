@extends('front.ecommerce.checkout.checkout')
@section('checkout_processing')

    <div class="row">
        <h3>Mr. {{ Session::get('last_name') }}, Your Order has been Successfully placed. <a href="{{ route('welcome') }}">Go back</a></h2></h3>
    </div>






@endsection