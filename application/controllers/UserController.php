<?php

	namespace application\controllers;

	use application\core\Controller;

	class UserController extends Controller
	{
		public function loginAction()
		{
			if (!empty($_POST)) {
				$vars['id'] = $this->model->loginValidate($_POST);
				if (empty($vars)) {
					$this->view->message('error', $this->model->error);
				}
				$_SESSION['authed'] = $vars['id'];
				setcookie('user_id',$vars['id']);
				$this->view->location('user/profile');
			}
			$this->view->render('Вход');
		}

		public function profileAction(){
			$this->view->render('Профиль');
		}

		public function registrationAction()
		{
			if(isset($_SESSION['authed'])){
				$this->view->redirect('/');
			}

			if (!empty($_POST)) {
				if ($this->model->isExist($_POST)) {
					$this->view->message('error', $this->model->error);
				} else {
					$add = $this->model->addUser($_POST);
					if ($add) {
						$_SESSION['authed'] = 1;
						$this->view->location('about');
					} else {
						$this->view->message('error', $this->model->error);
					}
				}
			}

			$this->view->render('Регистрация');
		}

		public function logoutAction(){
			unset($_SESSION['authed']);
			$this->view->redirect('user/login');
		}


	}