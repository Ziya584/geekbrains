<?php
	require_once 'classes/Db.php';
	include_once("classes\ImageRedakt.php");

	$db = new Db;
	//$res = $db->query("INSERT INTO users (nikname , email, password) VALUES (:nikname,:email,:password)",['nikname'=>'test',
	//	'email'=>'test@test.ru','password'=>'12345']);
	//$res = $db->row("INSERT INTO users SET name=:name, email=':email', password=:password",['id'=>20]);
	//var_dump($res);
?>

<form action="#" method="post" enctype="multipart/form-data">
	<input type="file" name="photo" accept="image/*">
	<input type="submit" value="download">
</form>

<?php
var_dump($_FILES);
	if(isset($_FILES['photo'])) {
		$img = $_FILES['photo'];
		$res = ImageRedakt::addImgtoDb($img);
var_dump($res);
//		echo "Изображение добавлено в бд. Вот его айди: ".$res;
	}