<?php

	namespace application\models;

	use application\core\Model;
	use application\lib\ImageUploader;
	use http\Params;
	use Imagick;

	class User extends Model
	{

		public $error;

		public function loginValidate($post)
		{
			$login = htmlentities($post['email']);
			$password = htmlentities($post['password']);
			$res = $this->db->row('SELECT nikname FROM users WHERE email=:login', ['login' => $login]);
			if (empty($res)) {
				$this->error = 'Пользователь с почтой ' . $login . ' не найден! ';
				return false;
			} else {
				$res = $this->db->row('SELECT id FROM users WHERE email=:email and password=:password', ['email' => $login, 'password' => $password]);
				return (empty($res))? $this->error = 'Пароль указан не верно!':$res[0]['id'];

			}
		}

		public function isExist($post)
		{
			$params['email'] = $post['email'];
			$res = $this->db->row('SELECT nikname FROM users WHERE email=:email', $params);
			if (!empty($res)) {
				$this->error = $res[0]['nikname'] . ", вы уже зарегистрированы у нас.";
				return true;
			}
			return false;
		}

		public function addUser($post)
		{

			$nikname = htmlentities($post['nikname']);
			$email = htmlentities($post['email']);
			$password = htmlentities($post['password']);
			$repassword = htmlentities($post['repassword']);

			$niknameLength = iconv_strlen($nikname);
			$emailLength = iconv_strlen($email);
			$passwordLength = iconv_strlen($password);
			$repasswordLength = iconv_strlen($repassword);


			if ($niknameLength < 3 || $niknameLength > 20) {
				$this->error = 'Название должно содержать от 3 до 20 символов';
				return false;
			} elseif ($passwordLength < 5) {
				$this->error = 'Пароль должен содержать от 5 символов. Минимум одну заглавную букву и одну цифру!';
				return false;
			} elseif ($passwordLength != $repasswordLength || $password != $repassword) {
				$this->error = 'Пароли не сопадают!';
				return false;
			}else {
				$params = [
					'nikname' => $nikname,
					'email' => $post['email'],
					'password' => $post['password']
				];
				$this->db->query('INSERT INTO users SET nikname=:nikname, email=:email, password=:password', $params);
//			$res = $this->db->query('INSERT INTO users (nikmame, email, password) VALUES (:nikname, :email, :password)',$params);

				return $this->db->lastInsertId();
			}
		}
	}