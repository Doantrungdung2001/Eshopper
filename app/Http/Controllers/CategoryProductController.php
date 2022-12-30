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
        $all_category_product =DB::table('category_product')->get();
        //dd($all_category);
        $manager_category_product = view('admin.allcategory')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admmin.allcategoyry',$manager_category_product);
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
    public function ActiveCategoryProduct($category_product_id){
        //DB::table('category_product')->where('id',$category_product_id)->update('category_status'=>0);

    }
    public function UnactiveCategoryProduct($category_product_id){
        
    }
}
