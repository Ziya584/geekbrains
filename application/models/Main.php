<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public $error;

	public function contactValidate($post) {
		$nameLen = iconv_strlen($post['name']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		return true;
	}

	public function offersCount() {
		return $this->db->column('SELECT COUNT(id) FROM offers');
	}

	public function offersList($route) {
		$max = 10;
		if(isset($route['page']) && !empty($route['page'])){
			$start = $route['page'];
		} else {
			$start = 0;
		}
		$start = ($start!=NULL)?$start:1;
		$params = [
			'max' => $max,
			'start' => ($start-1) * $max,
		];
		return $this->db->row('SELECT * FROM offers ORDER BY id DESC LIMIT :start, :max', $params);
	}

	public function imagesList(){
		return $this->db->row('SELECT * FROM images order by id desc');
	}





}