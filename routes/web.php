<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/home','App\Http\Controllers\HomeController@index');




//Backend
Route::get('/admin','App\Http\Controllers\AdminController@Index');
Route::get('/dashboard','App\Http\Controllers\AdminController@ShowDashboard');
Route::get('/logout','App\Http\Controllers\AdminController@Logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@Dashboard');


//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProductController@AddCategoryProduct');
Route::get('/all-category-product','App\Http\Controllers\CategoryProductController@AllCategoryProduct');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@EditCategoryProduct');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@DeleteCategoryProduct');

Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@ActiveCategoryProduct');
Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@UnactiveCategoryProduct');

Route::post('/save-category-product','App\Http\Controllers\CategoryProductController@SaveCategoryProduct');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@UpdateCategoryProduct');


//Brand Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProductController@AddBrandProduct');
Route::get('/all-brand-product','App\Http\Controllers\BrandProductController@AllBrandProduct');
Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProductController@EditBrandProduct');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProductController@DeleteBrandProduct');

Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProductController@ActiveBrandProduct');
Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProductController@UnactiveBrandProduct');

Route::post('/save-brand-product','App\Http\Controllers\BrandProductController@SaveBrandProduct');
Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProductController@UpdateBrandProduct');



//Product
Route::get('/add-product','App\Http\Controllers\ProductController@AddProduct');
Route::get('/all-product','App\Http\Controllers\ProductController@AllProduct');
Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@EditProduct');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@DeleteProduct');

Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@ActiveProduct');
Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@UnactiveProduct');

Route::post('/save-product','App\Http\Controllers\ProductController@SaveProduct');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@UpdateProduct');