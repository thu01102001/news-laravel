<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//trong controller muon su dung doi tuong nao thi phai khai bao o day
//doi tuong thao tac csdl
use DB;
//doi tuong ma hoa password
use Hash;

//thu hien QueryBuilder: su dung doi tuong DB

class UsersController extends Controller
{
    //read
    public function read(Request $request){
        //doi tuong Request su dung de lay gia tri theo kieu POST, GET
        //paginate(4) -> phan 4 ban ghi tren mot trang
        $data = DB::table("users")->orderBy("id","desc")->paginate(4);
        return view("admin.users_read",["data"=>$data]);
    }
    //update - GET
    public function update(Request $request, $id){
        //tao action de dua vao thuoc tinh action cua the form
        $action = url('admin/users/update/$id');
        //lay mot ban ghi
        //first() -> lay mot ban ghi
        $record = DB::table("users")->where("id",$id)->first();
        return view('admin.users_create_update',['record'=>$record]);
    }
    //update - POST
    public function updatePost(Request $request, $id){
        $name = $request->get("name");
        $password = $request->get("password");
        //update name
        DB::table("users")->where("id",$id)->update(['name'=>$name]);
        //neu passowrd khong rong thi update password
        if($password != ""){
            //ma hoa password
            $password = Hash::make($password);
            DB::table("users")->where("id",$id)->update(['password'=>$password]);
        }
        //di chuyen den mot url khac
        return redirect(url('admin/users'));
    }
    //create - GET
    public function create(Request $request){
        //tao action de dua vao thuoc tinh action cua the form
        $action = url('admin/users/create');
        return view('admin.users_create_update');
    }
    //create - POST
    public function createPost(Request $request){
        $name = $request->get("name");
        $email = $request->get("email");
        $password = $request->get("password");
        //ma hoa password
        $password = Hash::make($password);
        //insert name
        DB::table("users")->insert(['name'=>$name,'email'=>$email,'password'=>$password]);
        //di chuyen den mot url khac
        return redirect(url('admin/users'));
    }
    //delete
    public function delete(Request $request, $id){
        //lay mot ban ghi
        //first() -> lay mot ban ghi
        DB::table("users")->where("id",$id)->delete();
        //di chuyen den mot url khac
        return redirect(url('admin/users'));
    }
}
