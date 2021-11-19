<?php

use Illuminate\Support\Facades\Route;

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
//--------------
//load cac controller vao day de su dung
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
//---
Route::get('login',function(){
    return view('admin.login');
});
Route::post('login',function(){
    $email = Request::get("email");
    $password = Request::get("password");
    //Auth::attempt -> tra ve true neu email, password khop voi bang users
    if(Auth::attempt(['email'=>$email,'password'=>$password]))
        return redirect(url('admin/users'));
    return redirect(url('login'));
});
//dang xuat
Route::get('logout',function(){
    Auth::logout();
    return redirect(url('login'));
});
//---
//url: public/login
Route::group(['prefix'=>'admin','middleware'=>'checklogin'],function(){
    //---
    //chuc nang users - CRUD
    //read
    Route::get('users',[UsersController::class,'read']);
    //update - GET
    Route::get('users/update/{id}',[UsersController::class,'update']);
    Route::post('users/update/{id}',[UsersController::class,'updatePost']);
    //create - GET
    Route::get('users/create',[UsersController::class,'create']);
    Route::post('users/create',[UsersController::class,'createPost']);
    //delete
    Route::get('users/delete/{id}',[UsersController::class,'delete']);
    //---
    //---
    //chuc nang categories - CRUD
    //read
    Route::get('categories',[CategoriesController::class,'read']);
    //update - GET
    Route::get('categories/update/{id}',[CategoriesController::class,'update']);
    Route::post('categories/update/{id}',[CategoriesController::class,'updatePost']);
    //create - GET
    Route::get('categories/create',[CategoriesController::class,'create']);
    Route::post('categories/create',[CategoriesController::class,'createPost']);
    //delete
    Route::get('categories/delete/{id}',[CategoriesController::class,'delete']);
    //---
    //---
    //chuc nang news - CRUD
    //read
    Route::get('news',[NewsController::class,'read']);
    //update - GET
    Route::get('news/update/{id}',[NewsController::class,'update']);
    Route::post('news/update/{id}',[NewsController::class,'updatePost']);
    //create - GET
    Route::get('news/create',[NewsController::class,'create']);
    Route::post('news/create',[NewsController::class,'createPost']);
    //delete
    Route::get('news/delete/{id}',[NewsController::class,'delete']);
    //---
});
//--------------
//trang chủ
Route::get('',function(){
    return view('frontend.home');
});
//trang danh mục
Route::get('news/category/{category_id}',function($category_id){
    return view('frontend.newscategory',["category_id"=>$category_id]);
});
//trang chi tiết
Route::get('news/detail/{id}',function($id){
    return view('frontend.newsdetail',["id"=>$id]);
});
