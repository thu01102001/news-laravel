<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//su dung doi tuong thao tac csdl
use DB;
//su dung doi tuong Request de lay GET, POST
use Request;

class News extends Model
{
    //ham lay cac ban ghi co phan trang
    public function modelRead(){
        $data = DB::table("news")->orderBy("id","desc")->paginate(10);
        return $data;
    }
    //update
    public function modelGetRecord($id){
        $record = DB::table("news")->where("id","=",$id)->first();
        return $record;
    }
    //update
    public function modelUpdate($id){
        $name = Request::get("name");
        $category_id = Request::get("category_id");
        $description = Request::get("description");
        $content = Request::get("content");
        $hot = Request::get("hot") ? 1 : 0;
        //update ban ghi
        DB::table("news")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot]);
        //neu co anh thi upload anh
        //---
        if(Request::hasFile("photo")){
            //->select("photo") chi lay truong du lieu co ten la photo
            $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
            if(isset($oldPhoto->photo) && file_exists('upload/news/'.$oldPhoto->photo) && $oldPhoto->photo != "")
                unlink('upload/news/'.$oldPhoto->photo);
            //lay ten file
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move('upload/news',$photo);
            //update ban ghi
             DB::table("news")->where("id","=",$id)->update(['photo'=>$photo]);
        }
        //---
    }
    //create
    public function modelCreate(){
        $name = Request::get("name");
        $category_id = Request::get("category_id");
        $description = Request::get("description");
        $content = Request::get("content");
        $hot = Request::get("hot") ? 1 : 0;
        $photo = "";
        //neu co anh thi upload anh
        if(Request::hasFile("photo")){
            //lay ten file
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move('upload/news',$photo);
        }
        //insert ban ghi
        DB::table("news")->insert(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo]);
    }
    //delete
    public function modelDelete($id){
        //---
        //->select("photo") chi lay truong du lieu co ten la photo
        $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
        if(isset($oldPhoto->photo) && file_exists('upload/news/'.$oldPhoto->photo) && $oldPhoto->photo != "")
            unlink('upload/news/'.$oldPhoto->photo);
        //---
        DB::table("news")->where("id","=",$id)->delete();
    }
}
