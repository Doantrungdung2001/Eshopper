<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BrandProductController extends Controller
{

    public function AddBrandProduct(){
        return view('admin.add_brand');
    }
    public function AllBrandProduct(){
        $all_brand_product =DB::table('brand')->get();
        //dd($all_category);
        $manager_brand_product = view('admin.all_brand')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand',$manager_brand_product);
    }
    public function SaveBrandProduct(Request $request){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_describe;
        $data['brand_status'] = $request->brand_product_status;
        
        //dd($data);
        DB::table('brand')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-brand-product');
    }

    public function ActiveBrandProduct($brand_product_id){
        DB::table('brand')->where('id',$brand_product_id)->update(['brand_status'=>0]);
        return Redirect::to('all-brand-product');

    }

    public function UnactiveBrandProduct($brand_product_id){
        DB::table('brand')->where('id',$brand_product_id)->update(['brand_status'=>1]);
        return Redirect::to('all-brand-product');

    }

    public function EditBrandProduct($brand_product_id){
        $edit_brand_product =DB::table('brand')->where('id',$brand_product_id)->get();
        //dd($all_brand);
        $manager_brand_product = view('admin.edit_brand')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand',$manager_brand_product);
    }
    public function UpdateBrandProduct(Request $request,$brand_product_id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_describe;
        DB::table('brand')->where('id',$brand_product_id)->update($data);
        return Redirect::to('all-brand-product');
    }
    public function DeleteBrandProduct($brand_product_id){
        $delete_brand_product =DB::table('brand')->where('id',$brand_product_id)->delete();
        //dd($all_brand);
        return Redirect::to('all-brand-product');
    }

}
