- Laravel la mot php framework. Phien ban moi nhat (tinh den hien tai) la phien ban 8
- Trang chu laravel: https://laravel.com/
- Cai dat laravel
	1. Cai dat composer
		- Truy cap website: http://getcomposer.org -> click download -> click file composersetup.exe de download ve may va cai dat no
	2. Cai dat laravel
		- Truy cap vao thu muc xampp/htdocs -> tren thanh dia chi url go chu: cmd -> khi do cua so cmd se hien thi ra. Trong cua do cmd chay lenh sau: composer create-project laravel/laravel php56_laravel
	3. Chay website laravel bang duong dan: http://localhost/php56_laravel/public
- Cau truc thu muc laravel
	Controller: nam tai duong dan App\Htttp\Controllers\tenfile
		tenfile = tenController.php (co chu Controller dang sang ten)
	Model: nam tai duong dan App\tenfile
		tenfile = ten.php
		VD: file App\User.php la file model co san
	View: nam tai duong dan resources\views\ten.blade.php
		- cac file view chay bang template engine: blade template nen no co dinh dang ten.blade.php
		VD: file resources\views\welcome.blade.php la file co san
- De dieu phoi url, laravel co file routes\web.php se cau hinh tat ca cac duong dan, tu duong dan nay se goi den cac controller, cac view
	- Tim hieu file web.php		
