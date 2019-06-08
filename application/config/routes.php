<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],
	'contact' => [
		'controller' => 'main',
		'action' => 'contact',
	],
	'login' => [
		'controller' => 'main',
		'action' => 'login',
	],
	'logout' => [
		'controller' => 'main',
		'action' => 'logout',
	],
	'registration' => [
		'controller' => 'main',
		'action' => 'registration',
	],
	'gallery' => [
		'controller' => 'main',
		'action' => 'gallery',
	],
	'gallery/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'gallery',
	],
	'offer/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'offer',
	],



	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],
	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],
	'admin/delete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
	'admin/offers/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'offers',
	],
	'admin/offers' => [
		'controller' => 'admin',
		'action' => 'offers',
	],

	//USER
	'user/profile' =>[
		'controller'=>'user',
		'action'=>'profile'
	],
	'user/login' =>[
		'controller'=>'user',
		'action'=>'login'
	],
	'user/registration' =>[
		'controller'=>'user',
		'action'=>'registration'
	],
	'user/logout' =>[
		'controller'=>'user',
		'action'=>'logout'
	]


];