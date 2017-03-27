<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use DB;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

//session_start();
class SuperAdminController extends BackendController
{
    /*
    public function __construct() {

        $admin_id=Session::get('admin_id');
        if($admin_id == NULL)
        {
            return Redirect::to('/admin-login')->send();
        }
    }
   */
    public function index()
    {

        return view("admin.dashboard");

    }
    public function add_category()
    {
        return view('admin.category.add_category');

    }
    public function save_category(Request $request)
    {
        $messages = array(
            'category_name.required' => 'Category Name should not be empty...',
            'category_name.min' => 'Category Name should be minimum 3 characters...',
            'category_description.required' => 'Category Description should not be empty...',
            'publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'category_name' => 'required|min:3',
            'category_description' => 'required',
            'publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            $data = array();
            $data['category_name'] = $request->category_name;
            $data['category_description'] = $request->category_description;
            $data['publication_status'] = $request->publication_status;
            DB::table('category')->insert($data);
            Session::put('message', 'Save Category Information Successfully !');
            return redirect()->route('manage.category');
        }
    }
    public function manage_category()
    {
       $categories = DB::table('category')
               ->select('*')
               ->orderBy('category_id', 'desc')
               ->get(); 

        return view('admin.category.manage_category')->with('categories',$categories);
       //$manage_category= view('admin.pages.manage_category')->with('all_category',$all_category);
      // return view('admin.admin_master')
             //  ->with('admin_maincontent',$manage_category);
    }

    public function publish_category($category_id){

        $update_item = [

            'publication_status'=>1,
        ];

        $update_category = DB::table('category')
            ->where('category_id',$category_id)
            ->update($update_item);
        Session::put('message', 'Category has been Published !');
        return redirect()->route('manage.category');

    }
    public function unpublish_category($category_id){
        $update_item = [

            'publication_status'=>0,
        ];

        $update_category = DB::table('category')
            ->where('category_id',$category_id)
            ->update($update_item);
        Session::put('message', 'Category has been Unpublished !');
        return redirect()->route('manage.category');
    }

    public function edit_category($category_id)
    {
      $category_by_id=   DB::table('category')
                ->where('category_id',$category_id)
                ->first();


        return view('admin.category.edit_category')->with('single_category',$category_by_id);
       // $edit_category= view('admin.pages.edit_category')->with('single_category',$category_by_id);
        //return view('admin.admin_master')
            //->with('admin_maincontent',$edit_category);

    }
    public function update_category(Request $request)
    {
        $messages = array(
            'category_name.required' => 'Category Name should not be empty...',
            'category_name.min' => 'Category Name should be minimum 3 characters...',
            'category_description.required' => 'Category Description should not be empty...',
            'publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'category_name' => 'required|min:3',
            'category_description' => 'required',
            'publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $category_id= $request->category_id;
              $update_item = [

                'category_name'=>$request->category_name,
                'category_description'=>$request->category_description,
                'publication_status'=> $request->publication_status,
            ];

            $update_category = DB::table('category')
                ->where('category_id',$category_id)
                ->update($update_item);


            if($update_category){
                Session::put('message','Category Information has been Updated Successfully !');
                return redirect()->route('manage.category');

            }


        //return Redirect::to('manage-category');
        }
    }

    public function delete_category($category_id)
    {
        DB::table('category')
                ->where('category_id',$category_id)
                ->delete();
        Session::put('message','Category Information has been Deleted Successfully !');
        return redirect()->route('manage.category');
    }

    //Blog Section Start

    public function add_blog(){
        $categories = DB::table('ecategories')
            ->select('*')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.blogPages.add_blog')->with('categories',$categories);

    }

    public function save_blog(Request $request)
    {


        $messages = array(
            'blog_title.required' => 'Blog Name should not be empty...',
            'blog_title.min' => 'Blog Name should be minimum 3 characters...',
            'category_id.required' => 'Category Name should be selected from the option...',
            'blog_image.required' => 'Image should be uploaded...',
            'blog_description.required' => 'Blog Description should not be empty...',
            'author_name.required' => 'Author Name should not be empty...',
            'blog_tag.required' => 'Tag should not be empty...',
            'blog_publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'blog_title' => 'required|min:3',
            'category_id' => 'required',
            'blog_image' => 'required',
            'blog_description' => 'required',
            'author_name' => 'required',
            'blog_tag' => 'required',
            'blog_publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $data = array();
            $data['blog_title'] = $request->blog_title;
            $data['category_id'] = $request->category_id;
            $data['blog_description'] = $request->blog_description;
            $data['author_name'] = $request->author_name;
            $data['blog_tag'] = $request->blog_tag;
            $data['blog_publication_status'] = $request->blog_publication_status;

            //image process for inserting
            $image = $request->file('blog_image');
            if(!empty($image)){
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'admin_asset/upload/';
                $image_url = $upload_path.$image_full_name;
                $image->move($upload_path,$image_full_name);
                $data['blog_image'] = $image_url;
                $blog_id= DB::table('blog')->insertGetId($data);

            }

            $i_data = [];
            if($request->file('images')){
                $files = $request->file('images');

                foreach($files as $file) {
                    //$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                        $image_name = str_random(20);
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name.'.'.$ext;
                        $upload_path = 'admin_asset/upload/multiple/';
                        $image_url = $upload_path.$image_full_name;
                        $file->move($upload_path, $image_full_name);
                        $i_data['blog_id']= $blog_id;
                        $i_data['img_more'] = $image_url;
                        DB::table('tbl_img')->insert($i_data);
                        //$uploadcount ++;

                }
            }




            Session::put('message', 'Save Blog Information Successfully !');
            return redirect()->route('manage.blog');
        }

    }

    public function manage_blog(){


         $blogs = DB::table('blog')
                    ->leftJoin('ecategories', 'ecategories.id', '=', 'blog.category_id')
                    ->orderBy('blog_id', 'desc')
                    ->get();


        return view('admin.blogPages.manage_blog')->with('blogs',$blogs);
        //$manage_blog= view('admin.pages.manage_blog')->with('all_blog',$all_blog);
        //return view('admin.admin_master')
           // ->with('admin_maincontent',$manage_blog);
    }

    public function publish_blog($blog_id){

        $update_item = [

            'blog_publication_status'=>1,
        ];

        $update_category = DB::table('blog')
            ->where('blog_id',$blog_id)
            ->update($update_item);
        Session::put('message', 'Blog has been Publlished !');
        return redirect()->route('manage.blog');

    }
    public function unpublish_blog($blog_id){
        $update_item = [

            'blog_publication_status'=>0,
        ];

        $update_category = DB::table('blog')
            ->where('blog_id',$blog_id)
            ->update($update_item);
        Session::put('message', 'Blog has been Unpubllished !');
        return redirect()->route('manage.blog');
    }

    public function edit_blog($blog_id){
        $categories = DB::table('category')
            ->select('*')
            ->get();
        $blog_by_id = DB::table('blog')
            ->leftJoin('category', 'category.category_id', '=', 'blog.category_id')
            ->where('blog_id',$blog_id)
            ->first();


        return view('admin.blogPages.edit_blog')->with('single_blog',$blog_by_id)
                                      ->with('categories',$categories);



    }

    //I am working on edit_blog method
    public function update_blog(Request $request){
        $blog_id= $request->blog_id;

        $messages = array(
            'blog_title.required' => 'Blog Name should not be empty...',
            'blog_title.min' => 'Blog Name should be minimum 3 characters...',
            'category_id.required' => 'Category Name should be selected from the option...',

            'blog_description.required' => 'Blog Description should not be empty...',
            'author_name.required' => 'Author Name should not be empty...',
            'blog_tag.required' => 'Tag should not be empty...',
            'blog_publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'blog_title' => 'required|min:3',
            'category_id' => 'required',

            'blog_description' => 'required',
            'author_name' => 'required',
            'blog_tag' => 'required',
            'blog_publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            //image process for inserting

            if ($request->file('blog_image')) {
                //first unlink the image
                $file = DB::table('blog')
                    ->select('*')
                    ->where('blog_id', $blog_id)
                    ->first();


                $file_path = $file->blog_image;


                unlink($file_path);

                //end unlink image file

                $image = $request->file('blog_image');
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'admin_asset/upload/';
                $image_url = $upload_path . $image_full_name;
                $image->move($upload_path, $image_full_name);
                $data['blog_image'] = $image_url;

                $update_item = [

                    'blog_title' => $request->blog_title,
                    'category_id' => $request->category_id,
                    'blog_description' => $request->blog_description,
                    'author_name' => $request->author_name,
                    'blog_tag' => $request->blog_tag,
                    'blog_publication_status' => $request->blog_publication_status,
                    'blog_image' => $data['blog_image']
                ];

                $update_blog = DB::table('blog')
                    ->where('blog_id', $blog_id)
                    ->update($update_item);


                if ($update_blog) {
                    Session::put('message', 'Blog Information has been Updated Successfully !');
                    return redirect()->route('manage.blog', $blog_id);

                }


            } else {

                $update_item = [

                    'blog_title' => $request->blog_title,
                    'category_id' => $request->category_id,
                    'blog_description' => $request->blog_description,
                    'author_name' => $request->author_name,
                    'blog_tag' => $request->blog_tag,
                    'blog_publication_status' => $request->blog_publication_status,

                ];

                $update_blog = DB::table('blog')
                    ->where('blog_id', $blog_id)
                    ->update($update_item);


                if ($update_blog) {
                    Session::put('message', 'Blog Information has been Updated Successfully !');

                    return redirect()->route('manage.blog');

                }


            }


        }//end

    }
    public function delete_blog($blog_id)
    {
        //test
        $file=  DB::table('blog')
                ->select('*')
                ->where('blog_id',$blog_id)
                ->first();


        $file_path = $file->blog_image;


        unlink($file_path);



            DB::table('blog')
                ->where('blog_id',$blog_id)
                ->delete();
            Session::put('message', 'Blog has been Deleted !');
            return redirect()->route('manage.blog');



    }
    public function logout()
    {
        Session::put('admin_id',NULL);
        Session::put('admin_name',NULL);
        Session::put('message','You are Successfully Logout !');
        return Redirect::to('/admin-login');
    }
}
