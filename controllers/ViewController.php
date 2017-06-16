<?php

	class ViewController {

		public function actionIndex($id) {
			$id = $id;
			$segments = explode('?', $id);

			$vacancy = Vacancy::getById($id);

			// $relatives = Vacancy::getRelatives($vacancy['id'], $vacancy['category'], $vacancy['old'], $vacancy['date_end']);
			if ($vacancy){
				include_once(ROOT.'/views/view/index.php');
			} else {
				include_once(ROOT.'/views/errors/404.php');
			}
			return true;
		}

		public function actionTel() {
			if (isset($_POST['id'])){

			$contacts = Vacancy::getPhone($_POST['id']);
			$inform = array('phone' => $contacts['tel'], 'name' => $contacts['name']);
			// , 'vk' => $contacts['vk_id']
				if($contacts['vk_id'] != ''){
					$inform['vk'] = $contacts['vk_id'];
				}
				echo json_encode($inform);
			return true;
			}
		}

		public function actionRelatives() {

		if (isset($_POST['id']) && isset($_POST['category']) && isset($_POST['old']) && isset($_POST['df'])){
			$vacancies = Vacancy::getRelatives($_POST['id'], $_POST['category'], $_POST['old'], $_POST['df']);
			echo json_encode($vacancies);
		}
			return true;
		}

	}
?>