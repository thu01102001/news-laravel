<!-- load file layout.blade.php vao day -->
@extends("admin.layout")
@section("do-du-lieu")
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{ url('admin/news/create') }}" class="btn btn-primary">Add news</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List news</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width:100px;">Photo</th>
                    <td>Title</td>
                    <th style="width:200px;">Category</th>
                    <th style="width:100px;">Hot news</th>
                    <th style="width:100px;"></th>
                </tr>
                @foreach($data as $rows)
                <tr>
                    <td>
                        @if(file_exists('upload/news/'.$rows->photo) && $rows->photo != "")
                        <img src="{{ asset('upload/news/'.$rows->photo) }}" style="width:100px;">
                        @endif
                    </td>
                    <td>{{ $rows->name }}</td>
                    <td>
                        <!--  co the thuc hien truy van truc tiep tai view -->
                        <?php 
                            $category = DB::table("categories")->where("id","=",$rows->category_id)->first();
                            echo isset($category->name)?$category->name:"";
                         ?>
                    </td>
                    <td style="text-align:center;">
                        @if($rows->hot == 1)
                        <span class="fa fa-check"></span>
                        @endif
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ url('admin/news/update/'.$rows->id) }}">Edit</a>&nbsp;
                        <a href="{{ url('admin/news/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <!-- ham render su dung de phan trang -->
            {{ $data->render() }}
        </div>
    </div>
</div>
@endsection