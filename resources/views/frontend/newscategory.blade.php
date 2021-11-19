@extends('frontend.layout')
@section("do-du-lieu")
<?php
//lấy tiêu ddieef danh mục
    $category = DB::table("categories")->where("id","=",$category_id)->select("name")->first();
    //lấy danh sách các bài ghi có phân trang
    $categories = DB::table("news")->where("category_id","=",$category_id)->paginate(20);
?>
<div class="marked-title">
    <h3>{{ $category->name }}</h3>
</div>
<div class="row">
    @foreach($categories as $rows)
    <!-- list news -->
    <article>
        <div class="cat-post-desc">
            <h3><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
            <p><a href="{{ url('news/detail/'.$rows->id) }}"><img style="max-width: 100px;" class="img_category" src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a>{!! $rows->description !!}</p>
        </div>
        <div class="clear"></div>
        <div class="line_category"></div>
    </article>                       
    <!-- end list news -->
    @endforeach                                         
                            
</div>
<div class="clear"></div>
<div class="post-navi">
    <!-- phân trang -->
    {{ $categories->render() }}
</div>
@endsection