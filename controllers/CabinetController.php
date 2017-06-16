<?php

	class CabinetController {


		public function actionAdd($id = false) {
			User::isGuest();

		if (!$id){
			$user_name = '';
			$title = '';
			$salary = '';
			$desc = '';
			$category = false;
			$geo = false;
			$salary_params = false;
			$old = false;
			$date_start = '';
			$date_end = '';
			$date_daily = false;
			$img = true;
			$whatsapp = false;
			$telegram = false;
			$vk = false;
			$vkid = '';
			$tel = '';
		} else {
			Vacancy::checkRights($id);
			$vacancy = Vacancy::getByIdForEdit($id);
				$user_name = $vacancy['name'];
				$title = $vacancy['title'];
				$salary = $vacancy['salary'];
				$desc = $vacancy['description'];
				// $category = Categories::getByNum($vacancy['category']);
				$category = $vacancy['category'];
				$geo = $vacancy['geo'];
				$salary_params = $vacancy['salary_params'];
				$old = $vacancy['old'];
				$date_start = $vacancy['date_start'];
				$date_end = $vacancy['date_end'];
				$date_daily = $vacancy['date_daily'];
				$img_name = $vacancy['img'] ? $vacancy['img'] : $vacancy['category'];
				$whatsapp = $vacancy['whatsapp'];
				$vk = $vacancy['vk'];
				$telegram = $vacancy['telegram'];
				$vkid = $vacancy['vk_id'];
				$tel = $vacancy['tel'];
		}

			$result = false;
			$errors = [];
			$str = '';

			$img_err = null;
			$tmp_name = '';
			$is_dbgo = '';

		if (isset($_POST['submit'])) {

	$current_img_name = isset($_POST['current-img-name']) ? $_POST['current-img-name'] : false;
	$user_id = isset($_SESSION['admin_id']) ? 'admin-'.$_SESSION['admin_id'] : $_SESSION['user']['id'];
	$user_name = isset($_SESSION['admin']) ? $_POST['user_name'] : $_SESSION['user']['name'];
	$title = CheckData::title($_POST['title']);
	$category = CheckData::clean($_POST['category']);
	$geo = CheckData::clean($_POST['geo']);
	$salary = CheckData::salary($_POST['salary']);
	$salary_params = $_POST['salary_params'];
	$old = $_POST['old'];
	$desc = CheckData::description($_POST['desc']);
	$date_start = isset($_POST['date_start']) ? CheckData::date($_POST['date_start']) : false;
	$date_end = 	isset($_POST['date_end']) ? CheckData::date($_POST['date_end']) : false;
	$date_daily = isset($_POST['date_daily']) ? true : false;
	$img = $_FILES['image']['tmp_name'] ? true : false;
	$vk = isset($_POST['vk']) ? true : false;
	$vk_id = CheckData::vkId($_POST['vkid']);
	$whatsapp = isset($_POST['whatsapp']) ? true : false;
	$telegram = isset($_POST['telegram']) ? true : false;
	$tel = isset($_POST['tel']) ? $_POST['tel'] : false;

	if (!$vk) {
		$vkid = '';
	}


		if ($title === false) {
			$errors['title'] = "Название должно состоять от 6 до 47 символов";
		}
		if ($category == 'no') {
			$errors['category'] = "Выберите категорию";
		}
		if ($geo == 'no') {
			$errors['geo'] = "Выберите категорию";
		}
		if ($salary == false) {
			$errors['salary'] = "Укажите правильную сумму";
		}
		if ($salary_params == 'no') {
			$errors['salary_params'] = "Выберите зарплату: день/неделя/месяц";
		}
		if ($old == 'no') {
			$errors['old'] = "Выберите допустимый возраст";
		}
		if ($date_start == false && !$date_daily) {
			$errors['date_start'] = "Неправильная начальная дата";
		}
		if ($date_end == false && !$date_daily) {
			$errors['date_end'] = "Неправильная конечная дата";
		}
		if ($tel== false) {
			$errors['tel'] = "Не заполнено - телефон";
		}
		if ($vkid === false && $vk === true) {
			$errors['vk_id'] = "Ссылка на профиль неверная";
		}

			if ($img) {
				$img_err = CheckData::img($_FILES['image']['name'], $_FILES['image']['type'], $_FILES['image']['size']);
				if (!$img_err) {
					$img = $_FILES['image']['tmp_name'];
				} else {
					$errors['image'] = $img_err['image'];
				}
			}


	if(!$id){
		// Добавление вакансии
			if (!$errors) {
				$img_type = $_FILES['image']['type'];
				$result_add = Vacancy::add($user_id, $user_name, $img, $img_type, $title, $category, $salary, $salary_params, $geo, 
															$old, $desc, $date_start, $date_end, $date_daily, $vk, $whatsapp, $telegram, $vk_id, $tel);

			if ($result_add){
				if (isset($_SESSION['admin'])){
					exit(header("Location: /cabinet/admin/active"));
				} else {
					$_SESSION['added-vacancy'] = true;
					exit(header("Location: /cabinet"));
				}
			}
		}
	} else {
		// Редактирование вакансии
		if (!$errors) {
			if (Vacancy::checkRights($id)){
				$img_type = $_FILES['image']['type'];
				$result_upd = Vacancy::update($id, $user_id, $user_name, $img, $img_type, $current_img_name, $title, $category, $salary, $salary_params, $geo,$old, $desc, $date_start, $date_end, $date_daily, $vk, $whatsapp, $telegram, $vk_id, $tel);

					$_SESSION['added-vacancy'] = true;
					exit(header("Location: /cabinet"));
				}
		}
	}

				if (!$errors) $result = true;
		}

			include_once(ROOT.'/views/cabinet/add.php');
			return true;
		}


		public function actionEdit() {

		if (isset($_POST['title'])) {
	$errors = [];

	$title = CheckData::title($_POST['title']);
	$category = CheckData::clean($_POST['category']);
	$geo = CheckData::clean($_POST['geo']);
	$salary = CheckData::salary($_POST['salary']);
	$salary_params = $_POST['salary_params'];
	$old = $_POST['old'];
	$desc = CheckData::description($_POST['desc']);
	$date_start = isset($_POST['date_start']) ? CheckData::date($_POST['date_start']) : false;
	$date_end = 	isset($_POST['date_end']) ? CheckData::date($_POST['date_end']) : false;
	$date_daily = isset($_POST['date_daily']) ? true : false;
	$img = isset($_FILES['image']['tmp_name']) ? true : false;
	// $img = isset($_POST['image']['tmp_name']) ? true : false;
	$vk = isset($_POST['vk']) ? true : false;
	$vkid = CheckData::vkId($_POST['vkid']);
	$whatsapp = isset($_POST['whatsapp']) ? true : false;
	$telegram = isset($_POST['telegram']) ? true : false;
	$tel = isset($_POST['tel']) ? $_POST['tel'] : false;

	if (!$vk) {
		$vkid = '';
	}

	$errors = false;

		if ($title === false) {
			$errors['title'] = "Название должно состоять от 6 до 47 символов";
		}
		if ($category == 'no') {
			$errors['category'] = "Выберите категорию";
		}
		if ($geo == 'no') {
			$errors['geo'] = "Выберите категорию";
		}
		if ($salary == false) {
			$errors['salary'] = "Укажите правильную сумму";
		}
		if ($salary_params == 'no') {
			$errors['salary_params'] = "Выберите зарплату: день/неделя/месяц";
		}
		if ($old == 'no') {
			$errors['old'] = "Выберите допустимый возраст";
		}
		if (!$img) {
			$errors['img'] = 'Выберите изображение';
		}
		if ($date_start == false && !$date_daily) {
			$errors['date_start'] = "Неправильная начальная дата";
		}
		if ($date_end == false && !$date_daily) {
			$errors['date_end'] = "Неправильная конечная дата";
		}
		if ($tel== false) {
			$errors['tel'] = "Не заполнено - телефон";
		}
		if ($vkid === false && $vk === true) {
			$errors['vk_id'] = "Ссылка на профиль неверная";
		}

		if ($errors) {
			echo json_encode($errors);
		} else {
			echo json_encode(array(1 => 'Complete'));
		}
}

			return true;
		}

		public function actionProfile($type='profile'){
			User::isGuest();
			$user_id = $_SESSION['user']['id'];
			$blocked_count = Vacancy::getBlockedCount($user_id);

			$user = User::getDataForProfile($user_id);
			include_once(ROOT.'/views/cabinet/profile.php');
			return true;
		}

		public function actionProfileUpdate(){
			User::isGuest();
			if(isset($_POST['update'])){
				$params = array();
				if (isset($_POST['name'])) $params['name'] = $_POST['name'];
				if (isset($_POST['email'])) $params['email'] = $_POST['email'];
				if (isset($_POST['tel'])) $params['tel'] = $_POST['tel'];
				if (isset($_POST['vk'])) $params['vk'] = $_POST['vk'];
				if (isset($_POST['old_password'])) $params['old_password'] = $_POST['old_password'];
				if (isset($_POST['new_password'])) $params['new_password'] = $_POST['new_password'];
				$result = User::profileUpdate($params);
				echo json_encode(array('password' => $result));
			}
			return true;
		}

		public function actionIndex($type) {
			User::isGuest();
			$user_id = $_SESSION['user']['id'];

			$vacancies = array();
			$notVacancy = false;

			switch ($type) {
				case 'active':
					$vacancies = Vacancy::getActive($user_id);
					$blocked_count = Vacancy::getBlockedCount($user_id);
					$notVacancy = $vacancies ? false : 'Нет активных вакансий';
					break;

					case 'blocked':
					$vacancies = Vacancy::getBlocked($user_id);
					$blocked_count = Vacancy::getBlockedCount($user_id);
					$notVacancy = $vacancies ? false : 'Заблокированных нет';
					break;

					case 'old':
					$vacancies = Vacancy::getOld($user_id);
					$blocked_count = Vacancy::getBlockedCount($user_id);
					$notVacancy = $vacancies ? false : 'Нет завершенных';
					break;
			}

			include_once(ROOT.'/views/cabinet/index.php');
			return true;
		}

		public function actionDelete($vacancy_id) {
			User::isGuest();
			$user_id = $_SESSION['user']['id'];
			Vacancy::delete($vacancy_id, $user_id);

			return true;
		}

		public function actionStop($vacancy_id) {
			User::isGuest();
			$user_id = $_SESSION['user']['id'];
			Vacancy::stop($vacancy_id, $user_id);

			return true;
		}

		// Админка
		public function actionAdmin($type){
			User::isAdmin();

			switch ($type) {
				case 'active':
					$vacancies = Vacancy::getAllActive();
					$currentCount = count($vacancies);
					$notVacancy = $vacancies ? false : 'Нет активных вакансий';
					break;

				case 'moderation':
					$vacancies = Vacancy::getAllModeration();
					$currentCount = count($vacancies);
					$notVacancy = $vacancies ? false : 'Нет вакансий на модерации';
					break;

				case 'blocked':
					$vacancies = Vacancy::getAllBlocked();
					$currentCount = count($vacancies);
					$notVacancy = $vacancies ? false : 'Заблокированных нет';
					break;

				case 'old':
					$vacancies = Vacancy::getAllOld();
					$notVacancy = $vacancies ? false : 'Нет завершенных';
					break;
			}

			include_once(ROOT.'/views/cabinet/admin.php');
			return true;
		}

		public function actionAdminAdd($id=''){
			User::isAdmin();

			include_once(ROOT.'/views/cabinet/add.php');
			return true;
		}

		public function actionAdminSuccess($id){
			User::isAdmin();
			Vacancy::adminDoSuccess($id);

			header("Location: /cabinet/admin");
			return true;
		}

		public function actionAdminDelete($id){
			User::isAdmin();
			Vacancy::adminDoDelete($id);

			header("Location: /cabinet/admin");
			return true;
		}

		public function actionAdminBlocked($id, $code = 0){
			User::isAdmin();
			Vacancy::adminDoBlocked($id, $code);

			header("Location: /cabinet/admin");
			return true;
		}

		public function actionAdminStopped(){
			User::isAdmin();
			Vacancy::adminDoStopped();
			header("Location: /cabinet/admin");
			return true;
		}

		public function actionAdminAjax(){
			if ($_POST['type'] && $_POST['count']){
				$newCount = Vacancy::getCount($_POST['type']);
				$result = false;
				if ($newCount > $_POST['count']){
					$result = $newCount - $_POST['count'];
				}
				echo json_encode(array('result' => $result));
			}
			return true;
		}

	}
?>