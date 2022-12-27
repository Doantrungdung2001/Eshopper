<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.dashboard');

    }
}
