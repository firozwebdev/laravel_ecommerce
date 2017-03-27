<?php
namespace App\Http\Controllers\Frontend;
use App\Billing;
use App\Country;
use App\Customer;
use App\Http\Controllers\Controller;


use App\Eproduct;

use App\Notification;
use App\Order;
use App\OrderDetail;
use App\Shipping;
use Cart;
use App\Payment;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class CartController extends Controller{



    public function show_cart(){
        return view('front.ecommerce.pages.show_cart');
    }


    public function add_to_cart(Request $request){
        $product_quantity = $request->product_quantity;

        $id = $request->product_id;

        $product_info = Eproduct::findOrFail($id);

         Cart::add([
            'id' => $product_info->id,
            'name' => $product_info->product_title,
            'qty' => $product_quantity,
            'price' => $product_info->product_price,
            'options' =>[
                'image' => $product_info->product_image,


            ]
        ]);

        return redirect()->route('show.cart');
    }


    public function cart_quantity_update(Request $request){

        $qty = $request->cart_quantity;
        $rowId = $request->rowid;



        Cart::update($rowId, $qty);

        return redirect()->route('show.cart');


    }

    public function cart_remove($id){
        $rowid = $id;
        Cart::remove($rowid);
        return redirect()->route('show.cart');
    }

    public function checkout_user(){

        if(Session::has('customer_id')){
            return redirect()->route('payment.method');
        }
        return view('front.ecommerce.checkout.pages.checkout_user_registration');
    }

    public function checkout_billing_info(){
        $countries = Country::all();
        return view('front.ecommerce.checkout.pages.checkout_billing_registration')
                                ->with('countries',$countries);
    }
    public function checkout_shipping_info(){
        $countries = Country::all();
        return view('front.ecommerce.checkout.pages.checkout_shipping_registration')
                                  ->with('countries',$countries);
    }

    public function check_email(Request $request){
        $email_address = $request->email_address;
        $customer_info = Customer::findOrFail($email_address);
        if($customer_info){
            return 'Email is not available';
        }else{
            return 'Email available';
        }

    }

    public function billinginfo_save(Request $request){
        $existing_billing_info = Billing::where('customer_id',Session::get('customer_id'))->first();
        if($existing_billing_info){
            if($request->shipping_type==0){
                Session::flash('message','You have already saved your billing informations');
                return redirect()->route('payment.method');
            }
            if($request->shipping_type==1){
                Session::flash('message','You have already saved your billing informations');
                return redirect()->route('checkout.shippinginfo');
            }

        }
        $messages = array(
            'first_name.required' => 'First Name should not be empty...',
            'last_name.required' => 'Last Name should not be empty...',
            'email.required' => 'Email should not be empty...',
            'email.email' => 'This is not a valid email...',
            'password.required' => 'Password is required....',
            'password.min' => 'Password is minimum 1....' ,
            'password_confirm.same' => 'Confirm pass does not match with password....' ,
            //'password.confirmed' => 'Must be same....' ,
            //'password_confirm.confirmed' => 'Must be same with password field....' ,

            'company_name.required' => 'Company Name should not be empty...',
            'company_name.min' => 'Company Name should not be minimum 3 characters...',
            'address.required' => 'Address should not be empty...',
            'city.required' => 'City should not be empty...',
            'country.required' => 'Country should not be empty...',
            'street_address.required' => 'Street Address should not be empty...',
            'zip.required' => 'Zip code should not be empty...',


        );
        $rules = array(
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email_address' => 'required|email:email',
            'password' => 'required|min:1',
            'password_confirm' => 'required|min:1|same:password',
            'company_name' => 'required|min:5',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            'street_address' => 'required',
            'zip' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        $country = Country::where('country_code',$request->country)
            ->first();

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{

            $customer_data = Customer::create([
                'first_name' => $request->first_name,
                'last_name' =>$request->last_name ,
                'email_address' =>$request->email_address ,
                'password' =>$request->password ,
            ]);

            $billing_data = Billing::create([
                'customer_id' => $customer_data->id,
                'company_name' => $request->company_name,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $country->country,
                'mobile' => $request->mobile,
                'street_address' => $request->street_address,
                'zip' => $request->zip,
            ]);

            if($request->shipping_type==0){

                if($billing_data){
                    Session::put('customer_id',$billing_data->customer_id);
                    Session::put('billing_id',$billing_data->id);
                    return redirect()->route('payment.method');
                }
            }

            if($request->shipping_type==1){

                if($billing_data){
                    Session::put('customer_id',$billing_data->customer_id);
                    Session::put('billing_id',$billing_data->id);
                    return redirect()->route('checkout.shippinginfo');
                }

            }
        }


    }

    public function shippinginfo_save(Request $request){

        $existing_shipping_info = Shipping::where('customer_id',Session::get('customer_id'))->first();
        if($existing_shipping_info){
            Session::flash('message','You have already saved your shipping informations');
            return redirect()->route('payment.method');
        }

        if(Session::has('customer_id')){
            $messages = array(

                'company_name.required' => 'Company Name should not be empty...',
                'company_name.min' => 'Company Name should not be minimum 3 characters...',
                'address.required' => 'Address should not be empty...',
                'city.required' => 'City should not be empty...',
                'country.required' => 'Country should not be empty...',
                'street_address.required' => 'Street Address should not be empty...',
                'zip.required' => 'Zip code should not be empty...',


            );
            $rules = array(
                'company_name' => 'required|min:5',
                'address' => 'required',
                'city' => 'required',
                'country' => 'required',
                'mobile' => 'required',
                'street_address' => 'required',
                'zip' => 'required',
            );

            $validator = Validator::make($request->all(), $rules, $messages);
            $country = Country::where('country_code',$request->country)
                ->first()->country;

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }else{
                $shipping_data = Shipping::create([
                    'customer_id' => Session::get('customer_id'),
                    'company_name' => $request->company_name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $country,
                    'mobile' => $request->mobile,
                    'street_address' => $request->street_address,
                    'zip' => $request->zip,
                ]);

                if($shipping_data){
                    Session::put('shipping_id',$shipping_data->id);
                    return redirect()->route('payment.method');
                }
            }

        }else{
            return redirect()->route('customer.login');
        }
    }

    public function payment_method(){

        if(Session::has('customer_id')){

            if(! Session::has('billing_id')){
                $customer_id = Session::get('customer_id');




                $billing_data = DB::table('billings')
                                  ->where('customer_id',$customer_id)
                                  ->first();
                $shipping_data = DB::table('shippings')
                                  ->where('customer_id',$customer_id)
                                  ->first();


                Session::put('billing_id',$billing_data->id);
                Session::put('shipping_id',$shipping_data->id);

            }

            return view('front.ecommerce.checkout.pages.checkout_payment_method');
        }else{
            return redirect()->route('customer.login');
        }
    }

    public function save_order(Request $request){

        if(Session::has('customer_id')){
            $data = [];
            $data['customer_id'] = Session::get('customer_id');
            $customer_last_name = Customer::where('id',$data['customer_id'])->first()->last_name;
            $data['payment_method'] = $request->payment_method;
            $data['comments']= $request->comments;

            $payment_data = Payment::create($data);
            //Session::put('payment_id',$payment_data->id);
           /* $info = Customer::with('billing')
                ->with('shipping')
                ->with('payment')
                ->findOrFail(Session::get('customer_id'));*/
            $odata = [];
            $odata['customer_id'] = Session::get('customer_id');
            $odata['billing_id']  = Session::get('billing_id');
            if(! Session::has('shipping_id')){
                $odata['shipping_id']  = Session::get('billing_id');
            }
            if( Session::has('shipping_id')){
                $odata['shipping_id']  = Session::get('shipping_id');
            }

            $odata['payment_id']  = $payment_data->id;
            $odata['order_total']  = Session::get('grand_total');

            $order_data = Order::create($odata);
            $contents = Cart::content();
            $oddata = [];
            $order_details = [];

            foreach($contents as $content){
                $oddata['order_id'] = $order_data->id;
                $oddata['eproduct_id'] = $content->id;
                $oddata['product_name'] = $content->name;
                $oddata['product_price'] = $content->price;
                $oddata['product_sales_quantity'] = $content->qty;

                $order_details[] = OrderDetail::create($oddata);
            }

           foreach($order_details as $order_detail){
               $eproduct = Eproduct::where('id',$order_detail->eproduct_id)->first();
               $eproduct->best_sale_flag++;
               Eproduct::where('id',$eproduct->id)->update(['best_sale_flag'=>$eproduct->best_sale_flag]);
           }


            $notifications = Notification::create([
                'customer_id' => Session::get('customer_id'),
                'notification'=> 'Your Order has successfully been placed'
            ]);

           Session::put('last_name',$customer_last_name);

            if($data['payment_method'] == 'cash_on_delivery'){

                return view('front.ecommerce.checkout.pages.order_complete');
            }
            if($data['payment_method'] == 'paypal'){
                return view('front.ecommerce.pages.htmlWebsiteStandardPayment');
            }



        }else{
            return redirect()->route('customer.login');
        }
    }

    public function col_count(){



    }

    public function customer_logout(){
        Cart::destroy();
        Session::put('customer_id',null);
        Session::put('last_name',null);
        Session::put('billing_id',null);
        Session::put('shipping_id',null);



        return redirect()->route('welcome');
    }
}