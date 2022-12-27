<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index(){
        return view('login');
    }
    public function ShowDashboard(){
        return view('admin_layout');
    }
}
