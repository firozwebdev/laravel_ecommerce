<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Validator;
use Session;
use App\Http\Requests;

class UserController extends BackendController
{
    public function add_user(){
        return view('admin.userPages.add_user');
    }
    public function save_user(Request $request){

        $messages = array(
            'first_name.required'=>'Please give your First Name...',
            'last_name.required'=>'Please give your Last Name...',
            'email_address.required'=>'Please give your Email Address...',
            'email_address.unique'=>'This Email has already been taken. Try another one !',
            'password.required'=>'Please give your Password...',
            'password_confirm.required'=>'Confirm your Password...',
            'password_confirm.same'=>'Your Password Confirm does not match with your Password...',
            'address.required'=>'Please give your Address...',


        );
        $rules = array(
            'first_name' =>'required',
            'last_name' =>'required',
            'email_address' =>'required|email|unique:users',
            'password' =>'required|min:6',
            'password_confirm' => 'required|same:password',
            'address' =>'required',
        );

        $validator = Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){
            return redirect()->route('add.user')->withInput()->withErrors($validator);
        }else {

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $email_address = $request->email_address;
            $password = $request->password;
            $address = $request->address;


            DB::table('users')->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email_address,
                'password' => md5($password),
                'address' => $address,

            ]);

            Session::flash('message', 'User Information has been saved Successfully !');
            return redirect()->back();
        }
    }
    public function manage_user(){
        $users = DB::table('users')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.userPages.manage_user')->with('users',$users);
    }
    public function view_user(){

    }
}
