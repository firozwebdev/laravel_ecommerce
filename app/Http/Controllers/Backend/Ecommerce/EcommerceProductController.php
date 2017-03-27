<?php

namespace App\Http\Controllers\Backend\Ecommerce;

use App\Ecategory;
use App\Eproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Alert;

class EcommerceProductController extends Controller
{

    public function add_product(){

        $categories = Ecategory::all();

        return view('admin.ecommerce.product.add_product')->with('categories',$categories);
    }

    public function save_product(Request $request){


        $messages = array(
            'product_title.required' => 'Product Name should not be empty...',
            'product_title.min' => 'Product Name should be minimum 3 characters...',
            'ecategory_id.required' => 'Category Name should be selected from the option...',
            'product_image.required' => 'Image should be uploaded...',
            'product_description.required' => 'Product Description should not be empty...',
            'product_type.required' => 'Product Type should not be seleted...',
            'product_price.required' => 'Price should not be empty...',
            'product_quantity.required' => 'Product Quantity should not be empty...',
            'publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'product_title' => 'required|min:3',
            'ecategory_id' => 'required',
            'product_image' => 'required',
            'product_description' => 'required',
            'product_type' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            $file = $request->file('product_image');
            $fileName = $file->getClientOriginalName();
            $request->file('product_image')->move("front_assets/upload/",$fileName);
            if($fileName){
                Eproduct::create([
                    'product_title' => $request->product_title,
                    'ecategory_id' => $request->ecategory_id,
                    'product_image' => $fileName,
                    'product_description' => $request->product_description,
                    'product_type' => $request->product_type,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'publication_status' => $request->publication_status,
                ]);
                Session::put('message', 'Save Product Information Successfully !');
                return redirect()->route('ecommerce.add.product');
            }



        }

    }

    public function manage_product(){

        $products = Eproduct::all();
        //return $products;
        return view('admin.ecommerce.product.manage_product')
                                ->with('products',$products);
    }

    public function edit_product($id){
        $categories = Ecategory::all();
        $product = Eproduct::findOrFail($id);
        //return $product;
        return view('admin.ecommerce.product.edit_product')->with('product',$product)
            ->with('categories',$categories);
    }
    public function update_product(Request $request){
        $messages = array(
            'product_title.required' => 'Product Name should not be empty...',
            'product_title.min' => 'Product Name should be minimum 3 characters...',
            'ecategory_id.required' => 'Category Name should be selected from the option...',
            //'product_image.required' => 'Image should be uploaded...',
            'product_type.required' => 'Product Type should not be seleted...',
            'product_description.required' => 'Product Description should not be empty...',
            'product_price.required' => 'Price should not be empty...',
            'product_quantity.required' => 'Product Quantity should not be empty...',
            'publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'product_title' => 'required|min:3',
            'ecategory_id' => 'required',
            //'product_image' => 'required',
            'product_description' => 'required',
            'product_type' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {

            $id=$request->id;
            $file = $request->file('product_image');
            if($file){   // update with image
                $fileName = $file->getClientOriginalName();
                $request->file('product_image')->move("front_assets/upload/",$fileName);
                $update_category = Eproduct::findOrFail($id)->update([
                    'product_title' => $request->product_title,
                    'ecategory_id' => $request->ecategory_id,
                    'product_image' => $fileName,
                    'product_description' => $request->product_description,
                    'product_type' => $request->product_type,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'publication_status' => $request->publication_status,
                ]);
                if($update_category){
                    Session::put('message', 'Update Product Information Successfully !');
                    return redirect()->route('ecommerce.manage.product');
                }

            }else{  //update without image
                $update_category = Eproduct::findOrFail($id)->update([
                    'product_title' => $request->product_title,
                    'ecategory_id' => $request->ecategory_id,
                    'product_description' => $request->product_description,
                    'product_type' => $request->product_type,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'publication_status' => $request->publication_status,
                ]);
                if($update_category){
                    Session::put('message', 'Update Product Information Successfully !');
                    return redirect()->route('ecommerce.manage.product');
                }
            }



        }
    }
    public function publish_product($id){
        $update_item = [

            'publication_status'=>1,
        ];

        $update_product = Eproduct::findOrFail($id)->update($update_item);
        if($update_product){
            Session::put('message','Publish Product Information Successfully !');
            return redirect()->route('ecommerce.manage.product');
        }
    }
    public function unpublish_product($id){
        $update_item = [

            'publication_status'=>0,
        ];

        $update_product = Eproduct::findOrFail($id)->update($update_item);
        if($update_product){
            Session::put('message','Unublish Product Information Successfully !');
            return redirect()->route('ecommerce.manage.product');
        }
    }
    public function delete_product($id){
        $delete_product = Eproduct::where('id',$id)->delete();
        if($delete_product){
            //Session::put('message','Delete Product Information Successfully !');
            Alert::success('Delete Product Information Successfully !','Awesome');
            return redirect()->route('ecommerce.manage.product');
        }
    }



}
