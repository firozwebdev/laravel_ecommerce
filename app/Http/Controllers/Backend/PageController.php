<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use App\Http\Requests;

class PageController extends BackendController
{
  /*  public function __construct() {

        $admin_id=Session::get('admin_id');

        if($admin_id == NULL)
        {
            return redirect()->route('admin.login')->send();
        }
    }*/

    public function add_page(){
        $pages = DB::table('parent_page')
                 ->orderBy('parent_id', 'desc')
                 ->get();


        return view('admin.pagePages.add_page')->with('pages',$pages);
    }

    public function save_page(Request $request){

        $messages = array(
            'page_name.required' => 'Page Name should not be empty...',
            'page_name.min' => 'Page Name should be minimum 3 characters...',
            'parent_id.required' => 'Parent Name should be selected from the option...',
            'page_description.required' => 'Page Description should be given...',
            'page_publication_status.required' => 'Choose Publication Status from select option...',
        );

        $rules = array(
            'page_name' => 'required|min:3',
            'parent_id' => 'required',
            'page_description' => 'required',
            'page_publication_status' => 'required',

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $data = array();
            $data['page_name'] = $request->page_name;
            $data['parent_id'] = $request->parent_id;
            $data['page_description'] = $request->page_description;
            $data['page_publication_status'] = $request->page_publication_status;
            DB::table('page')->insert($data);



            Session::put('message', 'Save Page Information Successfully !');
            return redirect()->route('add.page');
        }


    }
    public function manage_page(){

        $pages = DB::table('page')
            ->leftJoin('parent_page', 'parent_page.parent_id', '=', 'page.parent_id')
            ->orderBy('page.parent_id', 'desc')
            ->get();


        return view('admin.pagePages.manage_page')->with('pages',$pages);
    }

    public function edit_page($page_id){
        $pages = DB::table('parent_page')
            ->orderBy('parent_id', 'desc')
            ->get();

        $page_by_id = DB::table('page')
                     ->where('page_id',$page_id)
                     ->first();


        return view('admin.pagePages.edit_page')->with('pages',$pages)->with('single_page',$page_by_id);
    }

    public function update_page(Request $request){

        $messages = array(
            'page_name.required' => 'Menu Name should not be empty...',
            'page_name.min' => 'Menu Name should be minimum 3 characters...',
            'parent_id.required' => 'Parent Name should not be empty...',
            'page_description.required' => 'Page Description should not be empty...',
            'page_publication_status.required' => 'Choose Publication Status from select option...',

        );
        $rules = array(
            'page_name' => 'required|min:3',
            'parent_id' => 'required',
            'page_description' => 'required',
            'page_publication_status' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

        } else {

            $page_id= $request->page_id;

            $update_item = [

                'page_name'=>$request->page_name,
                'parent_id'=>$request->parent_id,
                'page_description'=>$request->page_description,
                'page_publication_status'=> $request->page_publication_status,
            ];

            $update_page = DB::table('page')
                ->where('page_id',$page_id)
                ->update($update_item);


            if($update_page){
                Session::put('message','Update Page Information Successfully !');
                return redirect()->back();

            }


            //return Redirect::to('manage-category');
        }
    }

    public function publish_page($page_id){
        $update_item = [

            'page_publication_status'=>1,
        ];

        $update_category = DB::table('page')
            ->where('page_id',$page_id)
            ->update($update_item);
        return redirect()->route('manage.page');
    }
    public function unpublish_page($page_id){
        $update_item = [

            'page_publication_status'=>0,
        ];

        $update_category = DB::table('page')
            ->where('page_id',$page_id)
            ->update($update_item);
        return redirect()->route('manage.page');
    }

    public function delete_page($page_id)
    {
        DB::table('page')
            ->where('page_id',$page_id)
            ->delete();
        return redirect()->route('manage.page');
    }


}
