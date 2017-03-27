@include('front.partials.header')
<div class="main-slide">

    @yield('slider')

</div>

@yield('featured_product')


<div class="container">
    <div class="row">
@yield('main_content')
@yield('sidebar')



@include('front.partials.footer')
