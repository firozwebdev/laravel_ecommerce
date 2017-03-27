@extends('front.ecommerce.layout')
@section('content')
    <div id="content" class="extra_margin">
        <!-- ****************** Breadcrumb Section	****************** -->
        <div class="breadcrumb-section">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about-us.html">All Pages</a></li>
                    <li class="active">About Us</li>
                </ol>
            </div>
        </div>
        <section class="inner-content">
            <div class="container">
                <!-- ****************** About Us Section	****************** -->
                <div class="about-us">
                    <div class="heading"><span>About Us</span></div>
                    <label>What is Lorem Ipsum?</label>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>


                    <div class="img"><img src="{{ asset('front_assets/images/about-us-img.jpg') }}" alt="" class="img-responsive" /></div>
                    <label>Why do we use it?</label>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

                    <label>General Shipping Costs</label>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>


                    <label>What is Lorem Ipsum?</label>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>

                <!-- ****************** Our Customer  Section ****************** -->
                <section class="our-customers section-block">
                    <div class="heading"><span>Customers love our chocolates</span></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="cust-info">
                                        <span class="icon"><i class="fa fa-gift" aria-hidden="true"></i></span>
                                        <p><span class="counter">200</span> Orders Per Day </p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="cust-info">
                                        <span class="icon"><i class="fa fa-users " aria-hidden="true"></i></span>
                                        <p><span class="counter">35000</span> Customers </p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="cust-info">
                                        <span class="icon"><i class="fa fa-trophy" aria-hidden="true"></i></span>
                                        <p><span class="counter">15</span> Awards</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="client-slider">
                                <div>
                                    <div class="client-feedback">
                                        <div class="client-img"><img src="{{ asset('front_assets/images/user-img.jpg') }}" alt="" /></div>
                                        <div class="detail">
                                            <h4>John Doe</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the ...</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="client-feedback">
                                        <div class="client-img"><img src="assets/images/user-img.jpg" alt="" /></div>
                                        <div class="detail">
                                            <h4>John Doe</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the ...</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="client-feedback">
                                        <div class="client-img"><img src="assets/images/user-img.jpg" alt="" /></div>
                                        <div class="detail">
                                            <h4>John Doe</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the ...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>


    </div>

@endsection