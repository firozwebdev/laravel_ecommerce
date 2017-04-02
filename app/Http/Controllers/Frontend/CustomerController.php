<?php

namespace App\Http\Controllers\Frontend;
use App\Billing;
use App\Country;
use App\Customer;
use App\Eproduct;
use App\Notification;
use App\Order;
use App\OrderDetail;
use App\Http\Controllers\Controller;

use App\Province;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

use Validator;
use Input;
use Session;

class CustomerController extends Controller
{
   /* public function customer_dashboard(){
        if(Session::has('customer_id')){
            return view('front.ecommerce.customer.pages.personal_info');
        }
    } */

    public function select_province_by_country(Request $request){
        $country_code = $request->country_code;
        $customer_id = $request->customer_id;

        $province = Province::where('country_code',$country_code)->get();
        $province_from_billing_address = Billing::where('customer_id',$customer_id)->first();
        $province_from_shipping_address = Shipping::where('customer_id',$customer_id)->first();
        return response([
            'province'=>$province,
            'province_from_billing_address'=>$province_from_billing_address,
            'province_from_shipping_address'=>$province_from_shipping_address,
        ]);
    }
    public function select_provinces_on_change_country(Request $request){
        $country_code = $request->country_code;

        $province = Province::where('country_code',$country_code)->get();

        return $province;
    }

    public function change_password(){
        if(Session::has('customer_id')){
            return view('front.ecommerce.customer.pages.change_password');
        }
    }

    public function customer_orders(){
        if(Session::has('customer_id')){
            $customer_id = Session::get('customer_id');
            $order_info = Order::where('customer_id',$customer_id)->take(10)->orderBy('id','desc')->get();


            return view('front.ecommerce.customer.pages.orders')->with('order_info',$order_info);
        }
    }

    public function customer_billing_address(){

      /*  if(Session::has('customer_id')){
            $customer_id = Session::get('customer_id');

            $billing= Billing::where('customer_id',$customer_id)->first();
            $countries = Country::all();
            $provinces = Province::all();
        }
        return view('front.ecommerce.customer.pages.billing_address')->with([

            'billing'=>$billing,
            'countries'=>$countries,
            'provinces'=>$provinces
        ]); */



        if(Session::has('customer_id')){
            if(Session::has('billing_id')){

                $customer_id = Session::get('customer_id');

                $billing = Billing::where('customer_id',$customer_id)->first();

                $countries = Country::all();
                $provinces = Province::all();
                return view('front.ecommerce.customer.pages.billing_address')->with([

                    'billing'=>$billing,
                    'countries'=>$countries,
                    'provinces'=>$provinces,
                    'no_data' =>''
                ]);
            }else{


                $no_data = 'Sorry you did not set Billing Informations !!';
                return view('front.ecommerce.customer.pages.billing_address')->with('no_data',$no_data);
            }
        }else{
            return redirect()->route('customer.login');
        }





    }


    public function customer_billing_info_save(Request $request){


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
                ->first();

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }else{


                $billing_data = Billing::create([
                    'customer_id' => Session::get('customer_id'),
                    'company_name' => $request->company_name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $country->country,
                    'mobile' => $request->mobile,
                    'street_address' => $request->street_address,
                    'zip' => $request->zip,
                ]);

                if($billing_data){
                    Session::put('billing_id',$billing_data->id);
                    Session::flash('message','Billing informations is saved Successfully !!');
                    return redirect()->route('customer.billing.address');
                }else{
                    Session::flash('error','Billing informations is not saved Successfully !!');
                    return back();
                }
            }
        }else{
            return redirect()->route('customer.login');
        }
    }



    public function customer_billing_info_update(Request $request){


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

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }else{
                $customer_id = Session::get('customer_id');
                $country = Country::where('country_code',$request->country)
                    ->first()->country;

                $billing = Billing::where('customer_id',$customer_id)->update([
                    'company_name' => $request->company_name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $country,
                    'mobile' => $request->mobile,
                    'street_address' => $request->street_address,
                    'zip' => $request->zip,
                ]);

                if($billing){

                    Session::flash('message','Billing Info changes successfully');
                    return redirect()->route('customer.billing.address');
                }
            }

        }else{
            return redirect()->route('customer.login');
        }
    }

    public function customer_shipping_address(){


        if(Session::has('customer_id')){

            if(Session::has('shipping_id')){

                $customer_id = Session::get('customer_id');

                $shipping= Shipping::where('customer_id',$customer_id)->first();
                $countries = Country::all();
                $provinces = Province::all();
                return view('front.ecommerce.customer.pages.shipping_address')->with([

                    'shipping'=>$shipping,
                    'countries'=>$countries,
                    'provinces'=>$provinces,
                    'no_data'=>null
                ]);
            }else{


                $no_data = 'Sorry you did not set shipping Informations !!';
                return view('front.ecommerce.customer.pages.shipping_address')->with('no_data',$no_data);
            }

        }else{
            return redirect()->route('customer.login');
        }

    }


    public function customer_provide_billing_info(){

        if(Session::has('customer_id')){
            $countries = Country::all();
            $provinces = Province::all();

            return view('front.ecommerce.customer.pages.provide_billing_data')->with([
                'countries'=>$countries,
                'provinces'=>$provinces,
            ]);
        }else{
            return redirect()->route('customer.login');
        }

    }
    public function customer_provide_shipping_info(){

        if(Session::has('customer_id')){
            $countries = Country::all();
            $provinces = Province::all();

            return view('front.ecommerce.customer.pages.provide_shipping_data')->with([
                'countries'=>$countries,
                'provinces'=>$provinces,
            ]);
        }else{
            return redirect()->route('customer.login');
        }

    }

    public function customer_shipping_info_save(Request $request){


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
                ->first();

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }else{


                $shipping_data = Shipping::create([
                    'customer_id' => Session::get('customer_id'),
                    'company_name' => $request->company_name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $country->country,
                    'mobile' => $request->mobile,
                    'street_address' => $request->street_address,
                    'zip' => $request->zip,
                ]);

                if($shipping_data){
                    Session::put('shipping_id',$shipping_data->id);
                    Session::flash('message','Shipping informations is saved Successfully !!');
                    return redirect()->route('customer.shipping.address');
                }else{
                    Session::flash('error','Shipping informations is not saved Successfully !!');
                    return back();
                }
            }
        }else{
            return redirect()->route('customer.login');
        }
    }


    public function customer_shipping_info_update(Request $request){


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
            //$country = Country::where('country_code',$request->country)->first()->country;

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }else{
                $customer_id = Session::get('customer_id');
                $customer_shipping_info = Shipping::where('customer_id',$customer_id)->first();
                if($customer_shipping_info){
                    $country = Country::where('country_code',$request->country)
                        ->first()->country;

                    $shipping = Shipping::where('customer_id',$customer_id)->update([
                        'company_name' => $request->company_name,
                        'address' => $request->address,
                        'city' => $request->city,
                        'country' => $country,
                        'mobile' => $request->mobile,
                        'street_address' => $request->street_address,
                        'zip' => $request->zip,
                    ]);

                    if($shipping){

                        Session::flash('message','Shipping Info changes successfully');
                        return redirect()->route('customer.shipping.address');
                    }else{
                        Session::flash('error','Something problem in your shipping info !!');
                        return redirect()->route('customer.shipping.address');
                    }
                }
            }


        }else{
            return redirect()->route('customer.login');
        }
    }


    public function customer_personal_info(){
        if(Session::has('customer_id')){
            $customer_id = Session::get('customer_id');
            $customer = Customer::findOrFail($customer_id);
            $shipping = Shipping::where('customer_id',$customer_id)->first();
            if($shipping){
              Session::put('shipping_id',$shipping->id);
            }
            return view('front.ecommerce.customer.pages.personal_info')->with('customer',$customer);
        }else{
            return redirect()->route('customer.login');
        }

    }

    public function customer_personal_info_update(Request $request){
        if(Session::has('customer_id')){

            $messages = array(
                'first_name.required' => 'First Name should not be empty...',
                'last_name.required' => 'Last Name should not be empty...',
                'email.required' => 'Email should not be empty...',
                'email.email' => 'This is not a valid email...',
                'password.required' => 'Password is required....',
                'password.exists' => 'Password does not match ....',
                'password.min' => 'Password is minimum 1....' ,
                'passconf.same' => 'Confirm pass does not match with new password....' ,



            );
            $rules = array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email_address' => 'required|email:email',
                //'password' => 'required|min:1|exists:customers',
                'password' => 'required|min:1',
                'new_password' => 'required|min:1',
                'passconf' => 'required|min:1|same:new_password',

            );

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {

                return redirect()->back()->withInput()->withErrors($validator);
            }else{


                $customer = Customer::where('id',Session::get('customer_id'))->first();
                if( (md5($request->password)== $customer->password)){

                    $customer_id = Session::get('customer_id');
                    $customer_info = Customer::findOrFail($customer_id);
                    $customer = Customer::where('id',$customer_id)->update([
                        'first_name'=>$request->first_name,
                        'last_name'=>$request->last_name,
                        'email_address'=>$request->email_address,
                        'password'=>md5($request->new_password),

                    ]);

                    if($customer){
                        Session::flash('message','Changes are made successfully');
                        return redirect()->route('customer.personal.info');
                    }
                }else{
                    Session::flash('error','Current password is incorrect');
                    return redirect()->route('customer.personal.info');
                }
            }

        }else{
            return redirect()->route('customer.login');
        }


    }

    public function customer_notifications(){
        if(Session::has('customer_id')){
            $customer_id = Session::get('customer_id');
            $notifications = Notification::where('customer_id',$customer_id)->where('notification_status',0)->orderBy('created_at','desc')->get();

            foreach($notifications as $notification){


                 Notification::where('customer_id',$customer_id)->update([
                    'notification_status'=>1,
                 ]);
            }

            $notifications = Notification::where('customer_id',$customer_id)->orderBy('created_at','desc')->paginate(5);

            if(count($notifications)>0){


                return view('front.ecommerce.customer.pages.notifications')->with('notifications',$notifications);
            }else{

                return view('front.ecommerce.customer.pages.notifications')->with('notifications',null);

            }

        }else{
            return redirect()->route('customer.login');
        }

    }

}