<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Requests;
use DB;
use Session;
use Validator;
session_start();
class AdminController extends Controller
{
    public function __construct() {
        $admin_id=Session::get('admin_id');
        if($admin_id != NULL)
        {
            return Redirect::to('/dashboard')->send();
        }
    }


    public function admin_login()
    {
        return view('admin.login');
    }
    public function admin_login_check(Request $request)
    {

        $messages = array(
            'admin_email_address.required' => 'Email is required...',
            'admin_email_address.email' => 'This is not a valid email...',
            'admin_password.required' => 'Password is required...',
            'admin_password.min' => 'Password should be min 6 characters...',
        );

        $rules = array(
            'admin_email_address' => 'required|email',
            'admin_password' => 'required|min:6',
        );



        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('admin.login')->withInput()->withErrors($validator);
        } else {

            $admin_email_address = $request->admin_email_address;
            $admin_password = md5($request->admin_password);

            //echo $admin_email_address .'----------'.$admin_password;
            $result = DB::table('admin')
                ->where('admin_email_address', $admin_email_address)
                ->where('admin_password', $admin_password)
                ->first();

            if ($result) {
                Session::put('admin_id', $result->admin_id);
                Session::put('admin_name', $result->admin_name);
                return Redirect::to('/dashboard');
            } else {

                Session::put('exception', 'Email or Password may be Invalid !');
                return Redirect::to('/admin-login');
            }
        }
    }


    
}
