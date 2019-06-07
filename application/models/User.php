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
			$res = $this->db->row('SELECT nikname FROM users WHERE email=:login',['login' =>$login]);
			if (empty($res)) {
				$this->error = 'Пользователь с почтой '.$login.' не найден! ';
				return false;
			}else{
				$res = $this->db->row('SELECT nikname FROM users WHERE email=:login and password=:password', ['login' =>$login, 'password'=> $password ]);
				exit();
				(empty($res))?$this->error = 'Пароль указан не верно!': '';
				return $res[0];
			}
		}

		public function isExist($post){
			$params['email']=$post['email'];
			$res = $this->db->row('SELECT nikname FROM users WHERE email=:email', $params);
			if (!empty($res)){
				$this->error= $res[0]['nikname'].", вы уже зарегистрированы у нас.";
				return true;
			}
			return false;
		}

		public function addUser($post){
//			$post=array_diff_key($post,['repassword']);
			$params=[
				'nikname'=>$post['nikname'],
				'email'=>$post['email'],
				'password'=>$post['password']
			];
			$res = $this->db->query('INSERT INTO users SET nikname=:nikname, email=:email, password=:password',$params);
//			$res = $this->db->query('INSERT INTO users (nikmame, email, password) VALUES (:nikname, :email, :password)',$params);

			return $this->db->lastInsertId();;

		}
	}