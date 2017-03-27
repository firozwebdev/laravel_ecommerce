@extends('front.ecommerce.newest_product_layout')
@section('newest_product_content')
    <div class="col-md-9">
        <!-- ****************** Blogs Section	****************** -->
        <div class="blogs-list">
            <div class="blog">
                <div class="row detail-desc">
                    <div class="col-sm-12">
                        <div class="blog-img">
                            <ul class="list-inline social-share">
                                <li><a href="blog-details-right-sidebar.html#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="blog-details-right-sidebar.html#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="blog-details-right-sidebar.html#" class="mail"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li><a href="blog-details-right-sidebar.html#" class="more"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                            </ul>
                            <img src="{{ asset($newest_product->blog_image)}}" alt="" />
                            <div class="date">10 Oct</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="blog-detail">
                            <div class="name">{{ $newest_product->blog_title }}</div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden.</p>
                            <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful in the middle of text. </p>
                        </div>
                        <div class="comment-box">
                            <div class="top-row">
                                <span class="comment-number">0 Comment</span>
                                <div class="right-bar">
                                    <label>Sort by :</label>
                                    <select id="short-by" class="selectpicker show-tick form-control">
                                        <option>Oldest</option>
                                        <option>Newest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="comment-area">
                                <div class="user-img"><img src="{{ asset('front_assets/images/user.png') }}" alt="" /></div>
                                <div class="comment-input">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <a href="blog-details-right-sidebar.html#" class="facebook-comment">Facebook Comments Plugin</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection