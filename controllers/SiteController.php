<?php

	class SiteController {

		public function actionRedirectCity(){
			header('Location: /kazan');
			return true;
		}

		public function actionIndex($category =  false, $some = false, $page = 1) {

			$text = isset($_GET['q']) ? $_GET['q'] : '';
			$date_from = isset($_GET['ds']) ? $_GET['ds'] : '';
			$date_to = isset($_GET['df']) ? $_GET['df'] : '';
			$salary_from = isset($_GET['ss']) ? $_GET['ss'] : '';
			$salary_p = isset($_GET['sp']) ? $_GET['sp'] : '';
			$geo = isset($_GET['geo']) ? $_GET['geo'] : '';
			$old = isset($_GET['old']) ? $_GET['old'] : '';
			$dd = isset($_GET['dd']) ? 1 : '';

			$vacancyes = array();

			$notFound = false;
			$total = 0;
			$pagePrefix = 'page-';

			// Если нет категории -> все последние вакансии
			if (!$category) {
				if (self::issetParams($text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd)){
					$page = isset($_GET['p']) ? $_GET['p'] : 1;
					$pagePrefix = '&p=';
				 $vacancyes = Vacancy::getByParams(false, $text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd, $page);
				 $total = Vacancy::getCountByParams(false, $text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd);
				} else {
					$vacancyes = Vacancy::getLast($page);
					$total = Vacancy::getCountLast();
					$pagePrefix = 'page-';
				}
			} else {
				// Если есть категория
				// Категория НЕ существует
				$category = Categories::getByCategory($category);

				if (!$category){
						$notFound = true;
				} else {
					// Категория существует
					// Есть параметры?
					if (self::issetParams($text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd)) {
						$page = isset($_GET['p']) ? $_GET['p'] : 1;
						$pagePrefix = '&p=';
					$vacancyes = Vacancy::getByParams($category, $text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd, $page);
					$total = Vacancy::getCountByParams($category, $text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd);
					} else {
						$pagePrefix = 'page-';
						$vacancyes = Vacancy::getByCategory($category, $page);
						$total = Vacancy::getCountByCategory($category);
					}
				}
			}


			// Создаем объект Pagination - постраничная навигация
			$pagination = new Pagination($total, $page, Vacancy::SHOW_BY_DEFAULT, $pagePrefix);

			if (!$notFound){
				require_once(ROOT.'/views/site/search.php');
			} else {
				require_once(ROOT.'/views/errors/404.php');
			}
			return true;
		}

		// True - если есть хоть один параметр, false - нет ниодного
		private function issetParams($text, $date_from, $date_to, $salary_from, $salary_p, $geo, $old, $dd) {
			if ($text || $date_from || $date_to || $salary_from || $salary_p || $geo || $old || $dd){
				return true;
			} else { 
				return false;
			}
		}

		// Обрабатываем запрос (POST) и редиректим на главную с GET ссылкой
		public function actionSearch() {
			if (isset($_POST['submit'])) {
				$category = isset($_POST['category']) ? $_POST['category'] : false;
				$q = isset($_POST['q']) && $_POST['q'] != '' ? CheckData::clean($_POST['q']) : false;
				$qm = isset($_POST['qm']) && $_POST['qm'] != '' ? CheckData::clean($_POST['qm']) : false;
				if (isset($_POST['qm']) && $_POST['qm']) $q = $_POST['qm'];
				$date_from = isset($_POST['date_from']) ? $_POST['date_from'] : false;
				$date_to = isset($_POST['date_to']) ? $_POST['date_to'] : false;
				$salary_from = isset($_POST['salary_from']) ? $_POST['salary_from'] : false;
				$salary_to = isset($_POST['salary_to']) ? $_POST['salary_to'] : false;
				$salary_p = isset($_POST['salary_p']) ? $_POST['salary_p'] : false;
				$geo = isset($_POST['geo']) ? $_POST['geo'] : false;
				$old = isset($_POST['old']) ? $_POST['old'] : false;
				$dd = isset($_POST['dd']) ? $_POST['dd'] : false;

				$params = array();
				$isCategory = '';

				if ($category){
					$isCategory = Categories::getByNum($category).'/';
				}

				if ($q) {
					$params['q'] = $q;
				}

				if ($date_from) {
					$params['ds'] = $date_from;
				}

				if ($date_to) {
					$params['df'] = $date_to;
				}

				if ($salary_from && intval($salary_from)) {
					$params['ss'] = $salary_from;
				}

				if ($salary_p) {
					$params['sp'] = $salary_p;
				}

				if ($geo) {
					$params['geo'] = $geo;
				}

				if ($old) {
					$params['old'] = $old;
				}

				if ($dd) {
					$params['dd'] = $dd;
				}

				$q_znak = count($params) == 0 ? '' : '?';
				$newUri = '/kazan/'.$isCategory.$q_znak.urldecode(http_build_query($params));

				header("location: $newUri");
			} else header("Location: /");
		}

		public function action403() {
			require_once(ROOT.'/views/errors/403.php');
			return true;
		}

		public function action404() {
			require_once(ROOT.'/views/errors/404.php');
			return true;
		}

		public function actionAbout(){
			require_once(ROOT.'/views/site/about.php');
			return true;
		}


	}
?>