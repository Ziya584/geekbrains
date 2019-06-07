<?php

namespace application\models;

use application\core\Model;
use application\lib\ImageUploader;
use Imagick;

class Admin extends Model {

	public $error;

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function offerValidate($post, $type) {
		$nameLen = iconv_strlen($post['title']);
		$descriptionLen = iconv_strlen($post['description']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 10 or $descriptionLen > 5000) {
			$this->error = 'Описание должно содержать от 10 до 5000 символов';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function offerAdd($post) {
		$params = [
			'id' => '',
			'title' => $post['title'],
			'description' => $post['description'],
			'price' => $post['price'],
		];
		$this->db->query('INSERT INTO offers VALUES (:id, :title, :description, :price)', $params);
		return $this->db->lastInsertId();
	}

	public function offerEdit($post, $id) {
		$params = [
			'id' => $id,
			'title' => $post['title'],
			'description' => $post['description'],
			'price' => $post['price'],
		];
		$this->db->query('UPDATE offers SET title = :title, description = :description, price = :price  WHERE id = :id', $params);
	}

	public function offerUploadImage($img, $id)
	{
		$image = new ImageUploader();
		$big_img_url = $image->save($img, $id);
		($big_img_url) ? $image->convert($big_img_url, $img, $id) : $this->error = "Ошибка загрузки изображения!";
	}

	public function isOfferExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM offers WHERE id = :id', $params);
	}

	public function offerDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM offers WHERE id = :id', $params);

		unlink('public/images/big/'.$id.'.png');
		unlink('public/images/small/'.$id.'.png');
		$this->message = "Товар удалён";
	}

	public function offerData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM offers WHERE id = :id', $params);
	}

}