<!-- load file layout.php vao day -->
@extends("php56.layout")
<!-- du lieu sau se do vao file layout.blade.php tai tag "du-lieu-do-vao-tag-main" -->
@section("du-lieu-do-vao-tag-main")
	<h1>Đây là trang chủ</h1>
	<?php echo "<h1>Hello world</h1>"; ?>
@endsection

<!-- du lieu sau se do vao phan header cua file layout.blade.php -->
@section("do-du-lieu-vao-phan-header")
<h1>Dữ liệu của MVC trangchu đổ vào header</h1>
@endsection