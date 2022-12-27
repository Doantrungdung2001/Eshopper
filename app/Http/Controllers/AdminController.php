<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Index(){
        return view('login');
    }
    public function ShowDashboard(){
        return view('admin.dashboard');
    }
    public function Dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        $result = DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        //dd($result);
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Username or Password incorrect!!!');
            return Redirect::to('/admin');
        }
        

    }
    public function Logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
