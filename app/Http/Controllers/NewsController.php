<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//load class Model de su dung o day
use App\News;

class NewsController extends Controller
{
    public $model;
    //ham tao
    public function __construct(){
        //gan bien $model tro thanh mot bien object cua class News
        //khi do tu bien $model nay co the goi cac ham trong class News
        $this->model = new News();
    }
    //lay danh sach cac ban ghi
    public function read(Request $request){
        //lay du lieu tu ham modelRead cua class News
        $data = $this->model->modelRead();
        //goi view, truyen du lieu ra view
        return view("admin.news_read",["data"=>$data]);
    }
    //update
    public function update(Request $request,$id){
        //lay mot ban ghi
        $record = $this->model->modelGetRecord($id);
        return view("admin.news_create_update",["record"=>$record]);
    }
    //update post
    public function updatePost(Request $request,$id){
        $this->model->modelUpdate($id);
        return redirect(url('admin/news'));
    }
    //create
    public function create(Request $request){
        return view("admin.news_create_update");
    }
    //create post
    public function createPost(Request $request){
        $this->model->modelCreate();
        return redirect(url('admin/news'));
    }
    //delete
    public function delete(Request $request,$id){
        $this->model->modelDelete($id);
        return redirect(url('admin/news'));
    }
}
