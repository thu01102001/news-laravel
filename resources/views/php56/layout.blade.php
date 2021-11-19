<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>layout</title>
</head>
<body>
<div class="wrap">
	<header>
		<h1>header</h1>
		<!-- do du lieu tu mvc vao day -->
		@yield("do-du-lieu-vao-phan-header")
	</header>
	<nav>
		<ul>
			<li><a href="{{ url('trangchu') }}">Trang chủ</a></li>
			<li><a href="<?php echo url('gioithieu'); ?>">Giới thiệu</a></li>
		</ul>
	</nav>
	<content>
		<aside><h1>left</h1></aside>
		<article>
			<!-- du lieu cua cac mvc se do vao day -->
			@yield("du-lieu-do-vao-tag-main")
		</article>
	</content>
	<footer><h1>footer</h1></footer>
</div>
<style type="text/css">
	body,h1{padding: 0px; margin: 0px;}
	.wrap{width: 1000px; margin: auto;}
	content{display: flex;}
	aside{width: 250px; height: 400px; background: yellow;}
	article{width: 750px; height: 400px; background: white;}
	header, footer{height: 100px; background: green;}
	nav{background: black; line-height: 40px;}
	nav ul{padding: 0px; margin: 0px; list-style: none;}
	nav ul li{display: inline;}
	nav ul li a{padding: 15px; text-decoration: none; color: white;}
</style>
</body>
</html>