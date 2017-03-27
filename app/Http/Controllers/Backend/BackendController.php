<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
session_start();
class BackendController extends Controller
{
    public function __construct() {

        $admin_id=Session::get('admin_id');
        if($admin_id == NULL)
        {
            return redirect()->route('admin.login')->send();
        }

    }
}
