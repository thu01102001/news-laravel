@extends('frontend.layout')
@section('do-du-lieu')
<!-- list category tin tuc -->
<?php 
    $categories = DB::select("select *from categories where id in (select category_id from news where categories.id = news.category_id) order by id desc");
?>
@foreach($categories as $itemCategory)
<div class="row-fluid">
    <div class="marked-title">
        <h3><a href="{{ url('news/category/'.$itemCategory->id) }}" style="color:white">{{ $itemCategory->name }}</a></h3>
    </div>
</div>                    
<div class="row-fluid">
    <div class="span2">
        <?php 
            $first_news = DB::table("news")->where("category_id","=",$itemCategory->id)->offset(0)->take(1)->first();
        ?>
        <!-- first news -->
        <article>
            <div class="post-thumb">
                <a href="{{ url('news/detail/'.$first_news->id) }}"><img src="{{asset('upload/news/'.$first_news->photo) }}" alt=""></a>
            </div>
            <div class="cat-post-desc">
                <h3><a href="{{ url('news/detail/'.$first_news->id) }}">{{ $first_news->name }}</a></h3>
                <p>{!! $first_news->description !!}</p>
            </div>
        </article>
        <!-- end first news -->
    </div>
    <div class="span2">
        <?php
            $other_news = DB::table("news")->where("category_id","=","$itemCategory->id")->offset(1)->take(3)->get();
        ?>
        @foreach($other_news as $rows)
        <!-- list news -->
        <article class="twoboxes">
            <div class="right-desc">
                <h3><a href="{{ url('news/detail/'.$rows->id) }}"><img src="{{ asset('upload/news/'.$rows->photo) }}" alt=""></a><a href="{{ url('news/detail/'.$rows->id) }}">{!! $rows->description !!}</a></h3>  
                <div class="clear"></div>    
            </div>
            <div class="clear"></div>
        </article>
        <!-- end list news -->
        @endforeach
    </div>
</div>
<div class="clear"></div>
<!-- end list category tin tuc -->
@endforeach
@endsection