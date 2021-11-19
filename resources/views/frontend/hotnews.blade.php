 <!-- start slider -->
 <div class="cn_wrapper">
    <div id="cn_preview" class="cn_preview">
    	<?php 
    		$hotnews = DB::table("news")->orderBy("id","desc")->offset(0)->take(4)->get();
            $n = 0;
    	 ?>
    	 @foreach($hotnews as $rows)
    	 <?php $n++; ?>
       <!-- first hot news -->
        <div class="cn_content" style="@if($n == 1)top:0px; @endif background: url('{{ asset("upload/news/$rows->photo") }}') no-repeat center #ffffff; background-size: 100%;">
            <div class="caption">
                <h3><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></h3>
                <p>{!! $rows->description !!}</p>
            </div>
        </div>
        <!-- end first hot news -->
        @endforeach
        
        
    </div>
    <div id="cn_list" class="cn_list">
        <div class="cn_page" style="display:block;">
        	@foreach($hotnews as $rows)
            <!-- list hot news -->
            <div class="cn_item">
                <div class="left-box">
                    <img src="{{asset('upload/news/'.$rows->photo) }}" alt="">
                </div>
                <div class="right-box">
                    <h4>{{ $rows->name }}</h4>
                </div>
                <div class="clear"></div>
            </div>
            <!-- end list hot news -->
            @endforeach
            
        </div>
        
        
    </div>
</div>
<!-- end slider -->