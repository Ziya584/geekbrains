<?php

	namespace application\controllers;

	use application\core\Controller;

	class UserController extends Controller {
		public function indexAction() {
			if (isset($_SESSION['authed'])&& $_SESSION['authed']==1) {
				$this->view->redirect('user/profile');
			}
//			$_POST['email']='ziko_mr@mail.ru';
//			$_POST['password']=12345;


			if (!empty($_POST)) {
				$vars['id'] = $this->model->loginValidate($_POST);
				if (empty($vars)) {
					$this->view->message('error', $this->model->error);
				}
				$_SESSION['authed'] = 1;
				$this->view->location('user/profile');
			}
			$this->view->render('Вход');

		}
	}