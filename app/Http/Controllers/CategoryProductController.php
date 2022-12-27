<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class CategoryProductController extends Controller
{
    public function AddCategoryProduct(){
        return view('admin.addcategory');
    }
    public function AllCategoryProduct(){
        return view('admin.allcategory');
    }
    public function SaveCategoryProduct(Request $request){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_describe;
        $data['category_status'] = $request->category_product_status;
        
        //dd($data);
        DB::table('category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
    }
}
