<?php
//функция которая добавляет на сервер загруженные картинки и возвращает их имена
function galery(){
	// получаем имена ранее загруженных картинок
	$names = file_get_contents("pics_names.txt");
	$pictures=explode(',',$names);

	// проверяем была ли загружена картина
	if(isset($_FILES['photo']) && !empty($_FILES['photo'])){
		//записываем название в переменную name
		$name = basename($_FILES["photo"]["name"]);
		// загружаем фото в папку пик
		move_uploaded_file($_FILES['photo']['tmp_name'], "pic/$name");
		// получаем имена ранее загруженных картинок
		$names = file_get_contents("pics_names.txt");
		// добавляем новую картину в список
		$names .= ",".$name;
		//записываем в файл
		file_put_contents("pics_names.txt",$names);
		// заполняем имена картинок в массив
		$pictures=explode(',',$names);
		// возвращаем массив имен картинок
		return $pictures;
	}elseif(!empty($pictures)){
		return $pictures;
	}else{
		return FALSE;
	}
}
