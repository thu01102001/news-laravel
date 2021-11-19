<!-- ham url('duongdan') se tao url la duong dan ao -->
<form method="post" action="{{ url('laydulieuform1') }}">
	<!-- phai co ham sau thi laravel moi bat du lieu duoc sau khi an nut submit -->
	@csrf
	<fieldset style="width:300px; margin:20px auto;">
		<legend>Form</legend>
		<input type="text" name="txt" required> 
		<input type="submit" value="Submit">
	</fieldset>
	<h1>Truyền từ file web.php: {{ isset($txt) ? $txt : "" }}</h1>
	<h1>Lấy trực tiếp từ view: {{ Request::get("txt") }}</h1>
</form>