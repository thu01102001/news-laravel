@extends('admin.layout')
@section('do-du-lieu')
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit news</div>
        <div class="panel-body">
            <!-- muon upload duoc du lieu thi phai co thuoc tinh enctype=multipart/form-data -->
        <form method="post" enctype="multipart/form-data" action="">
            <!-- muon bat duoc du lieu trong laravel thi phai dung the csrf -->
            @csrf
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name) ? $record->name : ''; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Category</div>
                <div class="col-md-10">
                    <select name="category_id" class="form-control" style="width:300px;">
                        <?php 
                            //co the su dung full sql de truy van
                            $categories = DB::select("select * from categories order by id desc");
                         ?>
                         @foreach($categories as $rows)
                        <option @if(isset($record->category_id) && $record->category_id == $rows->id) selected @endif value="{{ $rows->id }}">{{ $rows->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Description</div>
                <div class="col-md-10">
                    <textarea name="description"><?php echo isset($record->description) ? $record->name : ''; ?></textarea>
                    <script type="text/javascript">CKEDITOR.replace('description');</script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Content</div>
                <div class="col-md-10">
                    <textarea name="content"><?php echo isset($record->content) ? $record->name : ''; ?></textarea>
                    <script type="text/javascript">CKEDITOR.replace('content');</script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="checkbox" @if(isset($record->hot) && $record->hot == 1) checked @endif name="hot" id="hot"> <label for="hot">Hot news</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Upload image</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection