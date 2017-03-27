<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
session_start();
class TestController extends Controller
{
    public function test(Request $request){
        return view('test',$request);
    }

}
