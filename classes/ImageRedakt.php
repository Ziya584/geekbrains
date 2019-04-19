<?php
include_once 'DB.php';
	class ImageRedakt{
		// сохраняет и возвращает путь к изображению с именем. тип: стринг
		public static function save($img){
			// проверяем была ли загружена картина
			if(isset($img['photo']) && !empty($img['photo'])){
				//записываем название в переменную name
				$name = basename($img["photo"]["name"]);
				// загружаем фото в папку пик
				move_uploaded_file($img['photo']['tmp_name'], "pic/big/$name");
				return "pic/big/$name";
			}else{
				return FALSE;
			}
		}

		// for jpg
		public static function resize_imagejpg($file, $w, $h) {
			list($width, $height) = getimagesize($file);
			$src = imagecreatefromjpeg($file);
			$dst = imagecreatetruecolor($w, $h);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
			return $dst;
		}

		// for png
		public static function resize_imagepng($file, $w, $h) {
			list($width, $height) = getimagesize($file);
			$src = imagecreatefrompng($file);
			$dst = imagecreatetruecolor($w, $h);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
			return $dst;
		}

		// for gif
		public static function resize_imagegif($file, $w, $h) {
			list($width, $height) = getimagesize($file);
			$src = imagecreatefromgif($file);
			$dst = imagecreatetruecolor($w, $h);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
			return $dst;
		}

		//меняет размер
		public static function convert($filepath,$img){
			$razmer = $img['photo']['size'];
			$type = $img['photo']['type'];
			$path = explode('/',$filepath);
			$name=$path[count($path)-1];
			$type=explode('/', $type);
			switch ($type[1]){
				case 'jpg':
					$res = ImageRedakt::resize_imagejpg($filepath,100, 100);
					imagejpeg($res,"pic/small/".$name);
					$values = "$name,pic/big/$name,pic/small/$name,$razmer";
					return DB::insert('pics','name, url_big, url_small, razmer',$values);
					break;
				case 'jpeg':
					$res = ImageRedakt::resize_imagejpg($filepath,100, 100);
					imagejpeg($res,"pic/small/".$name);
					$values = "$name,pic/big/$name,pic/small/$name, $razmer";
					return DB::insert('pics','name, url_big, url_small, razmer',$values);
					break;
				case 'png':
					$res = ImageRedakt::resize_imagepng($filepath,100, 100);
					imagepng($res,"pic/small/".$name);
					$values = "$name,pic/big/$name,pic/small/$name,$razmer";
					return DB::insert('pics','name, url_big, url_small, razmer',$values);
					break;
				case 'gif':
					$res = ImageRedakt::resize_imagegif($filepath,100, 100);
					imagejpeg($res,"pic/small/".$name);
					$values = "$name,pic/big/$name,pic/small/$name,$razmer";
					return DB::insert('pics','name, url_big, url_small, razmer',$values);
					break;
			}
		}

	}
