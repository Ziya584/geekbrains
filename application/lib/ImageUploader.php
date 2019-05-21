<?php

	namespace application\lib;


	class ImageUploader{

		// принимает загруженный файл
		// сохраняет и возвращает путь к изображению с именем. тип: стринг
		public function save($img,$id=''){
			if(isset($img) && !empty($img)){
				$type=explode('/', $img['type']);
				//записываем название в переменную name
				$name = ($id!='')?$id.'.'.$type[1]:basename($img["name"]);
				// загружаем фото в папку
				move_uploaded_file($img['tmp_name'], "public/images/big/$name");
				return "public/images/big/$name";
			}else{
				return FALSE;
			}
		}

		/* функции для изменения размера изображения */
		// for jpg
		public function resize_imagejpg($file, $w, $h) {
			list($width, $height) = getimagesize($file);
			$src = imagecreatefromjpeg($file);
			$dst = imagecreatetruecolor($w, $h);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
			return $dst;
		}
		// for png
		public function resize_imagepng($file, $w, $h) {
			list($width, $height) = getimagesize($file);
			$src = imagecreatefrompng($file);
			$dst = imagecreatetruecolor($w, $h);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
			return $dst;
		}
		// for gif
		public function resize_imagegif($file, $w, $h) {
			list($width, $height) = getimagesize($file);
			$src = imagecreatefromgif($file);
			$dst = imagecreatetruecolor($w, $h);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
			return $dst;
		}

		/* конец функций для изменения размера изображения */

		//меняет размер и возвращает пути
		public function convert($big_img, $img, $id=''){
			$razmer = $img['size'];
			$type = $img['type'];
			$type=explode('/', $type);
			$name = ($id!='')?$id.'.'.$type[1]:$img['name'];
			switch ($type[1]){
				case 'jpg':
					$res = $this->resize_imagejpg($big_img,100, 100);
					imagejpeg($res,"public/images/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"public/images/small/".$name];
					return $res;
					break;
				case 'jpeg':
					$res = $this->resize_imagejpg($big_img,100, 100);
					return imagejpeg($res,"public/images/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"public/images/small/".$name];
					return $res;
					break;
				case 'png':
					$res = $this->resize_imagepng($big_img,100, 100);
					imagepng($res,"public/images/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"public/images/small/".$name];
					return $res;
					break;
				case 'gif':
					$res = $this->resize_imagegif($big_img,100, 100);
					imagejpeg($res,"public/images/small/".$name);
					$res=['url_big'=>$big_img,'url_small'=>"public/images/small/".$name];
					return $res;
					break;
			}
		}

	}