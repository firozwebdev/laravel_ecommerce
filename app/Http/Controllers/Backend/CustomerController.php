<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class CustomerController extends Controller
{
    public function manage_customer(){
        if(Session::has('admin_id')){
            $customers = Customer::all();
            //return $customers;
            return view('admin.customerPages.manage_customer')->with('customers',$customers);
        }else{
            return redirect()->route('admin.login');
        }
    }
    public function show_customer($id){
        if(Session::has('admin_id')){
            $customer = Customer::findOrFail($id);
            //return $customer;
            return view('admin.customerPages.show_customer')->with('customer',$customer);
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function delete_customer($id){
        if(Session::has('admin_id')){
            $customer = Customer::findOrFail($id)->delete();
            if($customer){
                Session::flash('message','Customer has beed deleted successfully !');
                return redirect()->route('manage.customer');
            }
        }else{
            return redirect()->route('admin.login');
        }
    }

}
