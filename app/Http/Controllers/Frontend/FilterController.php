<?php

namespace App\Http\Controllers\Frontend;
use App\Customer;
use App\Eproduct;
use App\OrderDetail;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

use Validator;
use Input;
use Session;



class FilterController extends Controller
{

     public function short_by_filter(Request $request){
         $option_value =  $request->option_value;


         if($option_value == 'Featured'){
             $featured_products = Eproduct::where('product_type' ,'=', $option_value)
                 ->orderBy('id','=','desc')->get();

             return $featured_products;
         }
         if($option_value == 'Special'){
             $special_products = Eproduct::where('product_type' ,'=', $option_value)
                 ->orderBy('id','=','asc')->get();

             return $special_products;
         }
         if($option_value == 'Regular'){
             $regular_products = Eproduct::where('product_type' ,'=', $option_value)
                 ->orderBy('id','=','asc')->get();

             return $regular_products;
         }
         if($option_value == 'best_sale'){
             //$order_details_products = OrderDetail::distinct()->all();

             $order_details_products = DB::table('order_details')
                                        ->select('*')
                                        ->groupBy('eproduct_id')
                                        ->get();



             $best_sale_products = [];
             foreach($order_details_products as $order_details_product){
                // $best_sale_products[] = Eproduct::where('id',$order_details_product->eproduct_id)
                                            //->orderBy('best_sale_flag','asc')->get();

                 $best_sale_products[] = DB::table('eproducts')
                                            ->where('id',$order_details_product->eproduct_id)->get();
             }


             return $best_sale_products;

         }

         if($option_value == 'mostly_viewed'){
             $mostly_viewed_products = DB::table('eproducts')
                 ->select('*')
                 ->where('mostly_view_flag','>',0)
                 //->groupBy('mostly_view_flag')
                 ->orderBy('mostly_view_flag','desc')
                 ->get();

             return $mostly_viewed_products;
         }





     }




    public function short_by_items(Request $request)
    {
        $option_value = $request->option_value;

        $numbered_items = Eproduct::orderBy('id', 'desc')->take($option_value)->get();

        return $numbered_items;

    }

    public function short_by_price(Request $request){
        $min_price = $request->min;
        $max_price = $request->max;

        $products = Eproduct::whereBetween('product_price', [$min_price, $max_price])
            ->get();


            return $products;


    }

    public function category_wise_product($id){
        Session::put('category_id',$id);
        $products = Eproduct::where('ecategory_id',$id)
            ->paginate(12);

        return view('front.ecommerce.shop.pages.categorybased_products')->with('products',$products);
    }


    public function short_by_price_with_category(Request $request){
        $category_id = Session::get('category_id');
        if($category_id){
            $min_price = $request->min;
            $max_price = $request->max;
            $products = Eproduct::where('ecategory_id',$category_id)->whereBetween('product_price', [$min_price, $max_price])
                ->get();


                return $products;

        }
    }

    public function search_product(Request $request){
        $search_term = $request->search_product_name;
        $searched_products = Eproduct::where('product_title' ,'like', '%' . $search_term . '%')
            ->orderBy('id','=','desc')->paginate(15);



        return response()->json([
            'searched_products'       => $searched_products,
            'pagination' => (string)$searched_products->links()


        ]);
    }




    public function occasion_wise_product($id){
        Session::put('occasion_id',$id);
        $products = Eproduct::where('occasion_id',$id)
            ->paginate(12);


        return view('front.ecommerce.shop.pages.occasionbased_products')->with('products',$products);
    }


}