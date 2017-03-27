<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Ecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class EcommerceCategoryController extends Controller
{
    public function add_category(){
        return view('admin.ecommerce.category.add_category');
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

       // $validator = Validator::make($request->all(), $rules, $messages);
        $validator = Validator::make($request->all(),$rules,$messages);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            Ecategory::create([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'publication_status' => $request->publication_status,
            ]);
            Session::put('message', 'Save Category Information Successfully !');
            return redirect()->route('ecommerce.add.category');
        }
    }

    public function manage_category(){
        $categories = Ecategory::all();



        return view('admin.ecommerce.category.manage_category')->with('categories',$categories);
    }

    public function edit_category($id)
    {
        $category = Ecategory::findOrFail($id);



        return view('admin.ecommerce.category.edit_category')->with('single_category',$category);
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
            $id= $request->id;
            $update_item = [

                'category_name'=>$request->category_name,
                'category_description'=>$request->category_description,
                'publication_status'=> $request->publication_status,
            ];

            $update_category = Ecategory::findOrFail($id)->update($update_item);


            if($update_category){
                Session::put('message','Update Category Information Successfully !');
                return redirect()->back();

            }


            //return Redirect::to('manage-category');
        }

    }

    public function publish_category($id){

        $update_item = [

            'publication_status'=>1,
        ];

        $update_category = Ecategory::findOrFail($id)->update($update_item);
        if($update_category){
            Session::put('message','Publish Category Information Successfully !');
            return redirect()->route('ecommerce.manage.category');
        }


    }
    public function unpublish_category($id){
        $update_item = [

            'publication_status'=>0,
        ];

        $update_category = Ecategory::findOrFail($id)->update($update_item);
        if($update_category){
            Session::put('message','Unpublish Category Information Successfully !');
            return redirect()->route('ecommerce.manage.category');
        }

    }

    public function delete_category($id)
    {
        $delete_cat = Ecategory::where('id',$id)->delete();
        if($delete_cat){
            Session::put('message','Delete Category Information Successfully !');
            return redirect()->route('ecommerce.manage.category');
        }

    }


}
