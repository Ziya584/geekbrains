<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;

class MainController extends Controller {

	public function indexAction() {


		$pagination = new Pagination($this->route, $this->model->offersCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->offersList($this->route),
		];
		$this->view->render('Главная страница', $vars);
	}

	public function aboutAction() {
		$this->view->render('Обо мне');
	}

	public function contactAction() {
		if (!empty($_POST)) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			mail('ziyacloudmemory@gmail.com', 'Сообщение из интернет магазина', $_POST['name'].'|'.$_POST['email'].'|'.$_POST['text']);
			$this->view->message('success', 'Сообщение отправлено Администратору');
		}
		$this->view->render('Контакты');
	}

	public function offerAction() {
		$adminModel = new Admin;
		if (!$adminModel->isOfferExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $adminModel->offerData($this->route['id'])[0],
		];
		$this->view->render('Товар', $vars);
	}

	public function authAction() {
		$this->view->render('Авторизация');
	}

	public function registrationAction() {
		$this->view->render('Регистрация');
	}

	public function galleryAction(){
		$vars =[
			'list' => $this->model->imagesList()
		];
		$this->view->render('Галерея', $vars);
	}

}