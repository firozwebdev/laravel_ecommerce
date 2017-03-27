@extends('front.ecommerce.layout')
@section('content')
    <div id="content" class="extra_margin">

        <section class="inner-content">
            <div class="container">
                <!-- ****************** 404 page Section	****************** -->
                <div class="page-404">
                    <img src="{{ asset('front_assets/images/404-img.jpg') }}" alt="404 Image" />
                    <p>We can’t find the page you’re looking for.</p>
                    <a href="index.html" class="btn btn-info btn-large">Go to home page</a>
                </div>
            </div>
        </section>

    </div>

@endsection