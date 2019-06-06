<?php

	namespace application\models;

	use application\core\Model;
	use application\lib\ImageUploader;
	use Imagick;

	class User extends Model
	{

		public $error;

		public function loginValidate($post)
		{
			$login = htmlentities($post['email']);
			$password = htmlentities($post['password']);

			$params=[
				'login' =>$login,
				'password'=> $password
			];
//			return $this->db->query('SELECT * FROM users WHERE email=:login, password=:password',$params);
			$res = $this->db->row('SELECT nikname FROM users WHERE email=:login and password=:password', $params);

			if (empty($res)) {
				$this->error = 'Логин или пароль указан неверно';
				return false;
			}
			return $res[0];
		}
	}