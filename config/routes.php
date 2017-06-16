<?php
return array(

	'cabinet/admin/login' => 'user/adminLogin',
	'cabinet/admin/logout' => 'user/adminLogout',
	'cabinet/admin/active' => 'cabinet/admin/active',
	'cabinet/admin/blocked' => 'cabinet/admin/blocked',
	'cabinet/admin/old' => 'cabinet/admin/old',
	'cabinet/admin/stopped' => 'cabinet/adminStopped', // Завершить через Админку
	'cabinet/admin/do/success/([0-9]+)' => 'cabinet/adminSuccess/$1',
	'cabinet/admin/do/delete/([0-9]+)' => 'cabinet/adminDelete/$1',
	'cabinet/admin/do/blocked/([0-9]+)/code/([0-9]+)' => 'cabinet/adminBlocked/$1/$2', // Блокировать с пояснением
	'cabinet/admin/ajax' => 'cabinet/adminAjax',
	'cabinet/admin' => 'cabinet/admin/moderation',

	'cabinet/profile/update' => 'cabinet/profileUpdate',
	'cabinet/profile' => 'cabinet/profile',
	'cabinet/add' => 'cabinet/add',
	'cabinet/edit/([0-9]+)' => 'cabinet/add/$1',
	'cabinet/checkdata' => 'cabinet/edit',
	'cabinet/stop/([0-9]+)' => 'cabinet/stop/$1',
	'cabinet/delete/([0-9]+)' => 'cabinet/delete/$1',
	'cabinet/vacancies/moderation' => 'cabinet/index/moderation',
	'cabinet/vacancies/blocked' => 'cabinet/index/blocked',
	'cabinet/vacancies/old' => 'cabinet/index/old',
	'cabinet' => 'cabinet/index/active',


	'kazan/search' => 'site/search',


	'register' => 'user/register',
	'login/email' => 'user/emailauth',
	'login/vkauth' => 'user/vkauth',
	'login/([?a-z]+)' => 'user/vklogin/$1',

	'logout' => 'user/logout',


		'kazan/([a-z]+)/page-([0-9]+)' => 'site/index/$1/0/$2', //Pagination ByCategory
		'kazan/page-([0-9]+)' => 'site/index/0/0/$1', //Pagination
		'kazan/([a-z]+)/([?a-z]+)' => 'site/index/$1/$2',

		'kazan/page-([0-9]+)/([?][a-z]+)' => 'site/index/0/0/$1', //Pagination ByParams (no category)
		'kazan/([?][a-z]+)' => 'site/index/0/$1',


	'403' => 'site/403',
	'404' => 'site/404',


	'gettel' => 'view/tel',
	'getrelatives' => 'view/relatives',
	'kazan/vacancy/([0-9]+)' => 'view/index/$1',


	'kazan/([a-z-]+)' => 'site/index/$1',
	'kazan' => 'site/index',
	'about' => 'site/about',
	'' => 'site/redirectCity', // Должна быть страница с выбором городов!
	);
?>