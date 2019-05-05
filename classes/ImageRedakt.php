<?php
include_once 'Db.php';
	class ImageRedakt{


		// принимает загруженный файл
		// сохраняет и возвращает путь к изображению с именем. тип: стринг
		public static function save($img){
			if(isset($img) && !empty($img)){
				//записываем название в переменную name
				$name = basename($img["name"]);
				// загружаем фото в папку пик
				move_uploaded_file($img['tmp_name'], "pic/big/$name");
				return "pic/big/$name";
			}else{
				return FALSE;
			}
		}

		/* функции для изменения размера изображения */
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

		/* конец функций для изменения размера изображения */

		//меняет размер и возвращает пути
		public static function convert($big_img,$img){
			$razmer = $img['size'];
			$type = $img['type'];
			$name=$img['name'];
			$type=explode('/', $type);
			switch ($type[1]){
				case 'jpg':
					$res = ImageRedakt::resize_imagejpg($big_img,100, 100);
					imagejpeg($res,"pic/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"pic/small/".$name];
					return $res;
					break;
				case 'jpeg':
					$res = ImageRedakt::resize_imagejpg($big_img,100, 100);
					return imagejpeg($res,"pic/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"pic/small/".$name];
					return $res;
					break;
				case 'png':
					$res = ImageRedakt::resize_imagepng($big_img,100, 100);
					imagepng($res,"pic/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"pic/small/".$name];
					return $res;
					break;
				case 'gif':
					$res = ImageRedakt::resize_imagegif($big_img,100, 100);
					imagejpeg($res,"pic/small/".$name);

					$res=['url_big'=>$big_img,'url_small'=>"pic/small/".$name];
					return $res;
					break;
			}
		}

		public static function addImgtoDb($img){
			$urls = ImageRedakt::convert(ImageRedakt::save($img),$img);
			$db = new Db;
			$db ->query("INSERT INTO pics (name,url_big , url_small, razmer) VALUES (:name ,:url_big,:url_small,:razmer)",
				[$img['name'],'url_big'=>$urls['url_big'],	'url_small'=>$urls['url_small'],'razmer'=>$img['size']]);
			$id = $db->row("SELECT id FROM pics ORDER by id DESC LIMIT 1");
			return $id;
		}

		public static function deleteImgFromDb($id){

		}

		public static function getById($id){

		}

	}
