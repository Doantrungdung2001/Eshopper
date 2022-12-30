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

Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@ActiveCategoryProduct');
Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProductController@UnactiveCategoryProduct');

Route::post('/save-category-product','App\Http\Controllers\CategoryProductController@SaveCategoryProduct');