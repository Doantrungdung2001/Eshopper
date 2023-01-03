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
    public function AllProduct(){
        $all_product =DB::table('product')
        ->join('category_product','category_product.id','=','product.category_id')
        ->join('brand','brand.id','=','product.brand_id')
        ->orderBy('product.id','desc')->get();
        //dd($all_category);
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all',$manager_product);
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

    public function ActiveProduct($product_id){
        DB::table('product')->where('id',$product_id)->update(['product_status'=> 0]);
        return Redirect::to('all-product');

    }

    public function UnactiveProduct($product_id){
        DB::table('product')->where('id',$product_id)->update(['product_status'=> 1]);
        return Redirect::to('all-product');

    }

    public function EditProduct($product_id){
        $cate_product = DB::table('category_product')->orderBy('id','desc')->get();
        $brand_product = DB::table('brand')->orderBy('id','desc')->get();

        $edit_product =DB::table('brand')->where('id',$product_id)->get();
        //dd($all_brand);
        $manager_product = view('admin.edit_product')
        ->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function UpdateBrandProduct(Request $request,$brand_product_id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_describe;
        DB::table('brand')->where('id',$brand_product_id)->update($data);
        return Redirect::to('all-brand-product');
    }
    public function DeleteProduct($product_id){
        $delete_product =DB::table('product')->where('id',$product_id)->delete();
        //dd($all_brand);
        return Redirect::to('all-product');
    }
}
