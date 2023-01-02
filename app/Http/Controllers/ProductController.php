<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function AddProduct(){
        $cate_product = DB::table('category_product')->orderBy('id')->get();
        $brand_product = DB::table('brand')->orderBy('id')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function AllBrandProduct(){
        $all_brand_product =DB::table('brand')->get();
        //dd($all_category);
        $manager_brand_product = view('admin.all_brand')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand',$manager_brand_product);
    }
    public function SaveProduct(Request $request){
        $data = array();
        
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('assets/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
        //dd($data);
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
