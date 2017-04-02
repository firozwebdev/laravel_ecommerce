<?php

namespace App\Http\Controllers\Frontend;
use App\Billing;
use App\Customer;
use App\Eproduct;
use App\OrderDetail;
use App\Http\Controllers\Controller;

use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

use Validator;
use Input;
use Session;

class LoginController extends Controller
{
    public function customer_login(){

        return view('front.ecommerce.login');
    }

    public function customer_login_check(Request $request)
    {

        $messages = array(
            'email_address.required' => 'Email should not be empty...',
            'email_address.email' => 'This is not a valid email...',
            'password.required' => 'Password is required....',

        );
        $rules = array(
            'email_address' => 'required|email:email',
            'password' => 'required|min:1',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            //$email_address = $request->email_address;
            //$password = $request->password;

            $customer = Customer::where('email_address', $request->email_address)->where('password', '=', md5($request->password))
                ->first();

            $billing_info = Billing::where('customer_id',$customer->id)->first();
            $shipping_info = Shipping::where('customer_id',$customer->id)->first();

            if ($customer) {
                Session::put('customer_id', $customer->id);
                if($billing_info){
                    Session::put('billing_id', $billing_info->id);
                }
                if($shipping_info){
                    Session::put('shipping_id', $shipping_info->id);
                }

                return redirect()->route('shop.box.view');
            } else {
                Session::put('error', 'Your id or password invalid');
                return redirect()->route('customer.login');
            }
        }
    }

    public function customer_registration(){
        return view('front.ecommerce.registration');
    }

    // login after creating an accoun

    public function customer_registration_check(Request $request)
    {


        $messages = array(
            'first_name.required' => 'First Name should not be empty...',
            'last_name.required' => 'Last Name should not be empty...',
            'email_address.required' => 'Email should not be empty...',
            'email_address.email' => 'This is not a valid email...',
            'password.required' => 'Password is required....',

        );
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email:email',
            'password' => 'required|min:1',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            //$email_address = $request->email_address;
            //$password = $request->password;

            $customer = Customer::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email_address'=>$request->email_address,
                'password'=>$request->password
            ]);

            $billing_info = Billing::where('customer_id',$customer->id)->first();
            $shipping_info = Shipping::where('customer_id',$customer->id)->first();

            if ($customer) {
                Session::put('customer_id', $customer->id);
                if($billing_info){
                    Session::put('billing_id', $billing_info->id);
                }
                if($shipping_info){
                    Session::put('shipping_id', $shipping_info->id);
                }
                return redirect()->route('shop.box.view');
            } else {
                Session::put('error', 'Your id or password invalid');
                return redirect()->route('customer.login');
            }
        }
    }
}