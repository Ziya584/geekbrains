<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function loginAction() {
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('admin/add');
		}
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/add');
		}
		$this->view->render('Вход');
	}

	public function addAction() {
		if (!empty($_POST)) {
			if (!$this->model->offerValidate($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->offerAdd($_POST);
			if (!$id) {
				$this->view->message('success', 'Ошибка обработки запроса'. $id);
			}
			$this->model->offerUploadImage($_FILES['img'], $id);
			$this->view->message('success', 'Товар добавлен');
		}
		$this->view->render('Добавить товар');
	}

	public function editAction() {
		if (!$this->model->isOfferExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->offerValidate($_POST, 'edit')) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->offerEdit($_POST, $this->route['id']);
			if ($_FILES['img']['tmp_name']) {
				$this->model->offerUploadImage($_FILES['img'], $this->route['id']);
			}
			$this->view->message('success', 'Сохранено');
		}
		$vars = [
			'data' => $this->model->offerData($this->route['id'])[0],
		];
		$this->view->render('Редактировать товар', $vars);
	}

	public function deleteAction() {
		if (!$this->model->isOfferExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->offerDelete($this->route['id']);
		$this->view->redirect('admin/offers');
	}

	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('admin/login');
	}

	public function offersAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->offersCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->offersList($this->route),
		];
		$this->view->render('Товары', $vars);
	}
}