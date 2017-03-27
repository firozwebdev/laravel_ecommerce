<?php

namespace App\Http\Controllers\Frontend;
use App\Customer;
use App\Eproduct;
use App\OrderDetail;
use App\Http\Controllers\Controller;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

use Validator;
use Input;
use Session;



class WishlistController extends Controller
{
    public function save_product_to_wishlist($eproduct_id){
        if(Session::has('customer_id')){
            $customer_id = Session::get('customer_id');
            $wishlist = Wishlist::create([
                'customer_id'=>$customer_id,
                'eproduct_id'=>$eproduct_id,
            ]);

            if($wishlist){

                Session::put('message','Your product is saved to Wishlist successfully');

                return redirect()->route('shop.box.view');
            }
        }else{
            return redirect()->route('customer.login');
        }

    }

    public function show_wishlist(){
        if(Session::has('customer_id')){
            $customer_id = Session::get('customer_id');
            $wishlists = Wishlist::where('customer_id',$customer_id)->get();
            $wishproducts = [];
            foreach($wishlists as $wishlist){
                $wishproducts[]  = Eproduct::findOrFail($wishlist->eproduct_id);
            }

            if(!empty($wishproducts)){
                return view('front.ecommerce.shop.pages.wishlist')->with('products',$wishproducts);
            }else{
                return view('front.ecommerce.shop.pages.wishlist')->with('products',null);
            }

        }else{
            return redirect()->route('customer.login');
        }

    }

    public function remove_wishlist($eproduct_id){
       if(Session::has('customer_id')){
           $delete_wishlist_product = Wishlist::where('eproduct_id',$eproduct_id)->delete();
           if($delete_wishlist_product){
               return redirect()->route('show.wishlist');
           }
       }else{
           return redirect()->route('customer.login');
       }
    }

}