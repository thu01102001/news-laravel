<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//trong controller muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong ma hoa password
use Hash;

//muon su dung model Categories thi phai khai bao o day -> su dung eloquent
use App\Categories;

class CategoriesController extends Controller
{
    //read
    public function read(Request $request){
        //doi tuong Request su dung de lay gia tri theo kieu POST, GET
        //paginate(4) -> phan 4 ban ghi tren mot trang
        $data = Categories::orderBy("id","desc")->paginate(4);
        return view("admin.categories_read",["data"=>$data]);
    }
    //update - GET
    public function update(Request $request, $id){
        //tao action de dua vao thuoc tinh action cua the form
        $action = url('admin/categories/update/$id');
        //lay mot ban ghi
        //first() -> lay mot ban ghi
        $record = Categories::where("id",$id)->first();
        return view('admin.categories_create_update',['record'=>$record]);
    }
    //update - POST
    public function updatePost(Request $request, $id){
        $name = $request->get("name");
        //update name
        Categories::where("id",$id)->update(['name'=>$name]);
        //di chuyen den mot url khac
        return redirect(url('admin/categories'));
    }
    //create - GET
    public function create(Request $request){
        //tao action de dua vao thuoc tinh action cua the form
        $action = url('admin/categories/create');
        return view('admin.categories_create_update');
    }
    //create - POST
    public function createPost(Request $request){
        $name = $request->get("name");
        //insert name
        Categories::insert(['name'=>$name]);
        //di chuyen den mot url khac
        return redirect(url('admin/categories'));
    }
    //delete
    public function delete(Request $request, $id){
        //lay mot ban ghi
        //first() -> lay mot ban ghi
        Categories::where("id",$id)->delete();
        //di chuyen den mot url khac
        return redirect(url('admin/categories'));
    }
}
