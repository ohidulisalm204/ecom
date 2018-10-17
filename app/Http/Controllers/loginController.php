<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\customer;
use App\admin;
use Session;
session_start();



class loginController extends Controller
{ 
// Customer.................................>

    public function user_login()
    {
        return view('login');
    }

    public function user_log(Request $request)
    {
        $c_email = $request->c_email;
        $username = $request->c_email;
        $c_password = $request->c_password;     
        $result = DB::table('customers')
        ->where('c_password',$c_password)
        ->where('c_email',$c_email)
        ->orWhere('username',$username)
        ->first();

        if($result){
            Session::put('user',$result->first_name);
            Session::put('customer_id',$result->customer_id);

            return redirect()->back();
            // ->with(compact('id'));
        }
        else{
                Session::put('error',"The username or password invalid");
                return Redirect::to('customer_login_page');
            }
    }


    public function logout()
    {
        // Session::put('admin_name',null);
        // Session::put('admin_id',null);

        Session::flush();
        return redirect()->back();
    }

    public function AdminAuthCheck(){
        $customer_id = Session::get('customer_id');
        if($customer_id) {
            return redirect()->back();
        }
        else {
            return Redirect::to('home')->send();
        }
    }

}
