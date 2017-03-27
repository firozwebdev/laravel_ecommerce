<?php

namespace App\Http\Controllers\Frontend;
use App\Eproduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopController extends Controller
{
    public function shop_home(){  //shop box view

        $products = Eproduct::paginate(15);
        return view('front.ecommerce.shop.pages.shop_box_view')
                            ->with('products',$products);
    }
    public function shop_list(){  //shop_list_view

        $products = Eproduct::paginate(10);
        return view('front.ecommerce.shop.pages.shop_list_view')
                            ->with('products',$products);
    }
}
