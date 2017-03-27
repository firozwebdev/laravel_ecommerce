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



class EcommerceController extends Controller
{

    public function index() {

        //Featured products
        $featured_products = Eproduct::where('product_type' ,'=', 'featured')
                            ->orderBy('id','=','desc')->get();

        //Best selling products
        $results = OrderDetail::lists('eproduct_id')->all();
        $items = array_count_values($results);

        $best_sale = [];
        foreach($items as $key => $value) {
            $best_sale[] = Eproduct::where('id',$key)->get();

        }

        //Regular products
        $regular_products = Eproduct::where('product_type' ,'=', 'regular')
            ->orderBy('id','=','asc')->get();

        $blog_products =  $blogs = DB::table('blog')
                            ->orderBy('blog_id', 'desc')
                            ->get();

       return view('front.ecommerce.pages.front_home')->with([
           'featured_products' =>  $featured_products,
           'best_sale' =>  $best_sale,
           'regular_products' => $regular_products,
           'blog_products' => $blog_products,
       ]);

    }


    public function product_detail($id) {

        $product = Eproduct::findOrFail($id);
        $product->mostly_view_flag++;
        Eproduct::where('id',$product->id)->update(['mostly_view_flag'=>$product->mostly_view_flag]);
        $similar_products = Eproduct::where('ecategory_id',$product->ecategory_id)->get();

       return view('front.ecommerce.pages.product_detail')
           ->with('product',$product)
           ->with('similar_products',$similar_products);

    }

    //blog product considered as newest product

    public function newest_product_list(){
        $newest_product_list = DB::table('blog')
                                ->leftJoin('ecategories', 'ecategories.id', '=', 'blog.category_id')
                                ->orderBy('blog_id','desc')
                                ->paginate(2);
        return view('front.ecommerce.pages.newest_product_list')
            ->with('newest_product_list',$newest_product_list);
    }

    public function newest_product_details($id){
        $newest_product = DB::table('blog')
                                ->leftJoin('ecategories', 'ecategories.id', '=', 'blog.category_id')
                                ->where('blog_id',$id)
                                ->first();

        return view('front.ecommerce.pages.newest_product_detail')
                            ->with('newest_product',$newest_product);
    }


    public function check_customer(Request $request){


            $email_address = $request->email_address;
            $password= $request->password;


            $customer = Customer::where('email_address','=',$email_address)
                ->where('password','=',md5($password))
                ->first();





            if($customer){
                Session::put('customer_id',$customer->id);
                Session::put('last_name',$customer->last_name);
                Session::put('message',"You are Successfully Logged in !!");
                return redirect()->route('payment.method');

            }else{
                Session::put('error',"Email or Password is invalid. Please Try again !!");
                return back();
            }






    }



    public function contact_us(){
        return view('front.ecommerce.pages.contact_us');
    }

    public function contact_us_save(Request $request){



        $messages = array(
            'contact_first_name.required' => 'Please write your First name...',
            'contact_first_name.min' => 'First name should be minimum 5 characters...',

            'contact_last_name.required' => 'Please write your First name...',
            'contact_last_name.min' => 'First name should be minimum 5 characters...',

            'contact_email_address.required' => 'Email should not be empty...',
            'contact_email_address.email' => 'This is not a valid email...',

            'message_subject.required' => 'Subject should not be empty...',
            'message_subject.max' => 'Subject should  be maximum 200 characters...',

            'contact_message.required' => 'Message should not be empty...',

        );
        $rules = array(
            'contact_first_name' => 'required|min:5',
            'contact_last_name' =>  'required|min:5',
            'message_subject' => 'required|max:200',
            'contact_email_address' => 'required|email:email',
            'contact_message' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            DB::table('contact')->insert([
                'contact_first_name'=>$request->contact_first_name,
                'contact_last_name'=>$request->contact_last_name,
                'message_subject'=>$request->message_subject,
                'contact_email_address'=>$request->contact_email_address,
                'contact_message'=>$request->contact_message,

            ]);

            Session::put('message','Your Informations saved successfully !!');

            return redirect()->route('contact.us');
        }



    }

    public function about_us(){
        return view('front.ecommerce.pages.about_us');
    }

    public function shipping_information(){
        return view('front.ecommerce.pages.shipping_info');
    }
    public function page_404(){
        return view('front.ecommerce.pages.404');
    }



}