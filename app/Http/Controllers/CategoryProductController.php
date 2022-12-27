<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function AddCategoryProduct(){
        return view('admin.addcategory');
    }
    public function AllCategoryProduct(){
        return view('admin.allcategory');
    }   
}
