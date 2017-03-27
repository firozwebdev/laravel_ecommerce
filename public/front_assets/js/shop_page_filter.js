//filterer by sort by in shopping page.....
$(document).ready(function(){
    $('#short-by').change(function(){

        var option_value = $('#short-by').val();
        var token = '{{ csrf_token() }}';
        var process = " {{ route('short.by.filter') }} ";

        var data = {
            "_token":token,
            "option_value":option_value
        }

        $.post(process, data, function(result){
            console.log(result);
            var img_link = '{{ public_path() }}';
            console.log(img_link);
            var data = '';
            jQuery.each( result, function( i, val ) {

                var product_link = '/product-details/'+val.id;


                data += '<div class="col-md-4 col-sm-6">';
                data += '<div class="product-box">';
                data += '<div class="img"><img src="http://localhost:8000/front_assets/upload/'+ val.product_image +'" alt="" /></div>';
                data += '<div class="product-detail">';
                data += '<div class="name"><strong>Antique Gold - </strong>{!!  str_limit('+ val.product_title +',15)  !!}</div>';
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
                data += '<li><a href="cart.html" data-toggle="tooltip" data-placement="top" title="Cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>';
                data += '<li><a href="my-wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>';
                data += '<li><a href="/product-detail/'+ val.id +'" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
                data += '</ul>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
            })
            if(result){
                $('#shop_box_product').html(data);
            }
        });
    });
});