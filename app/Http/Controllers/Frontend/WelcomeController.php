<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Validator;
use Input;

use Session;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {


        $posts = DB::table('blog')
                ->leftJoin('category', 'category.category_id', '=', 'blog.category_id')
                ->select('*')
                ->orderBy('blog_id', 'desc')
                ->get();
        //$slider = view('front.slider');
       return view('front.content')->with('posts',$posts);
    }

    public function single_post($category_id,$blog_id){
        $counter = DB::table('blog')
                    ->select('*')
                    ->where('blog_id',$blog_id)
                    ->first();
        
         $counter->counter++;
         

         DB::table('blog')
            ->where('blog_id',$blog_id)
            ->update(['counter'=>$counter->counter]);
         
        
        $post = DB::table('blog')
            ->leftJoin('category', 'category.category_id', '=', 'blog.category_id')
            ->select('*')
            ->where('blog_id',$blog_id)
            ->first();


        $related_posts = DB::table('blog')
            ->leftJoin('category', 'category.category_id', '=', 'blog.category_id')
            ->select('*')
            ->where('category.category_id',$category_id)
            ->whereNotIn('blog.blog_id',[$blog_id])
            ->get();

        $comments = DB::table('comment')
                    ->where('comment_publication_status',1)
                    ->get();


        return view('front.single_post')->with('post',$post)
            ->with('related_posts',$related_posts)->with('comments',$comments);

       // $content=view('front.single_post')->with('post',$post)
                                         // ->with('related_posts',$related_posts);


    }

    public function user_register(){


        return view('front.register');
    }

    public function user_signup(Request $request){

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
            return Redirect::to('user-register')->withInput()->withErrors($validator);
        }else{

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $email_address = $request->email_address;
            $password = $request->password;
            $address = $request->address;


            DB::table('users')->insert([
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email_address'=>$email_address,
                'password'=>md5($password),
                'address'=>$address,

            ]);

            Session::flash('message','Your Information has been saved Successfully !');
            return redirect()->back();
        }


       /* $this->validate($request,[
            'first_name' =>'required|alpha',
            'last_name' =>'required|alpha',
            'email_address' =>'required|email',
            'password' =>'required|min:6',
            'address' =>'required',

        ]); */

    }


    public function user_signin(){
        return view('front.login');
    }
    public function user_postsignin(Request $request){
        $messages = [
            'email_address.required'=>'Please give your Email Address...',
            'password.required'=>'Please give your Password...',
        ];
        $rules = [
            'email_address' =>'required|email',
            'password' =>'required|min:6',
        ];


        $validator = Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){

            return redirect()->route('user.get.signin')->withInput()->withErrors($validator);
        }else{
            $email_address = $request->email_address;
            $password = $request->password;

            $user_check = DB::table('users')
                    ->select('*')
                    ->where('email_address',$email_address)
                    ->where('password',md5($password))
                    ->first();



            if($user_check){
                Session::put('id',$user_check->id);
                Session::put('name',$user_check->last_name);

                return redirect()->action('Frontend\WelcomeController@index');
            }

            return back();

        }
    }
    public function contact_me(){

        return view('front.contact_me');
    }

    public function save_contact(Request $request)
    {


        $messages = array(
            'contact_first_name.required' => 'Please give your First Name...',
            'contact_last_name.required' => 'Please give your Last Name...',
            'message_subject.required' => 'Please give your Subject...',
            'contact_email_address.required' => 'Please give your Email Address...',
            'contact_email_address.unique' => 'This Email has already been taken. Try another one !',
            'contact_message.required' => 'Message should not be empty...',
        );

        $rules = array(
            'contact_first_name' => 'required',
            'contact_last_name' => 'required',
            'message_subject' => 'required',
            'contact_email_address' => 'required|email|unique:contact',
            'contact_message' => 'required'
        );


        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect()->route('contact.me')->withInput()->withErrors($validator);
        } else {

            $data = [];
            $data['contact_first_name']= $request->contact_first_name;
            $data['contact_last_name']= $request->contact_last_name;
            $data['message_subject']= $request->message_subject;
            $data['contact_email_address']= $request->contact_email_address;
            $data['contact_message']= $request->contact_message;


            DB::table('contact')->insert($data);

            Session::flash('message', 'Your Information has been send Successfully ! We will contact you soon !');
            return redirect()->back();
        }

    }

    public function save_comment(Request $request){
        $data = [

            'blog_id'   => $request->blog_id,
            'user_id'   => Session::get('id'),
            'comment_author' => Session::get('name'),
            'comment'   => $request->comment
        ];

        //dd($data);
        DB::table('comment')->insert($data);

        Session::flash('message', 'Your comment is awaiting under moderation !');
        return redirect()->back();
    }

    public function user_logout(){
        Session::put('id',null);
        Session::put('name',null);

        return redirect()->action('Frontend\WelcomeController@index');
    }
}
