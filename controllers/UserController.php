<?php

	class UserController {

		public function actionRegister(){
			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
				$data = array();
				$row = User::register($_POST['name'], $_POST['email'], $_POST['password']);

				if (isset($row['id'])){
					$data = array('result' => true, 'id' => $row['id']);
						$_SESSION['user']['id'] = $row['id'];
						$_SESSION['user']['name'] = $_POST['name'];
						$_SESSION['user']['account_type'] = 'email';
				}else {
					if (isset($row['email'])){
						$data = array('result' => false, 'email' => true);
					}
				}

				echo json_encode($data);
			}
			return true;
		}

		public function actionVkauth() {
			$client_id = '5863169';
			$client_secret = 'Te4YwBpwJH08HbGxyM4n';
			$redirect_uri = 'http://dopjob.ru/login/vk';

			$url = 'http://oauth.vk.com/authorize';

			$params = array(
			    'client_id'     => $client_id,
			    'redirect_uri'  => $redirect_uri,
			    'response_type' => 'code',
			    'display' => 'popup'
			);
			$urlauth = $url.'?'.urldecode(http_build_query($params));

			exit(header("Location: $urlauth"));

			return true;
		}

		public function actionEmailauth(){
			if (isset($_POST['login']) && isset($_POST['password'])){
				$data = array();
				$row = User::login($_POST['login'], $_POST['password']);
				if ($row){
					$data = array('result' => true);
						$_SESSION['user']['id'] = $row['id'];
						$_SESSION['user']['name'] = $row['name'];
						$_SESSION['user']['account_type'] = 'email';
				} else {
					$data = array('result' => false);
				}
				echo json_encode($data);
			}
				return true;
		}

		public function actionVklogin($some) {
			$client_id = '5863169';
			$client_secret = 'Te4YwBpwJH08HbGxyM4n';
			$redirect_uri = 'http://dopjob.ru/login/vk';

			if (isset($_GET['code'])) {
		    $params = array(
		        'client_id' => $client_id,
		        'client_secret' => $client_secret,
		        'code' => $_GET['code'],
		        'redirect_uri' => $redirect_uri
    );

			$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,hash,photo_rec',
            'access_token' => $token['access_token']
        );

				$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get'.
					'?' .urldecode(http_build_query($params))), true);

				if (isset($userInfo['response'][0]['uid'])){

							if(!User::isRegistered($userInfo['response'][0]['uid']))
									User::registerByVk($userInfo['response'][0]['uid'], $userInfo['response'][0]['first_name']);
							User::updateDataByVk($userInfo['response'][0]['uid'], $userInfo['response'][0]['first_name']);

							$_SESSION['user']['photo'] = $userInfo['response'][0]['photo_rec'];
							$_SESSION['user']['name'] = $userInfo['response'][0]['first_name'];
							$_SESSION['user']['account_type'] = 'vk';
							exit(header("Location: /cabinet"));
				}
		}
	}

			return true;
		}

		public function actionLogout() {
			unset($_SESSION['user']);
			header("Location: /");
			return true;
		}

		// Админка
		public function actionAdminLogin(){
			if (isset($_POST['submit'])){
				$login = $_POST['login'];
				$password = $_POST['password'];
				$admin_id = User::adminLogin($login, $password);
				if ($admin_id){
					$_SESSION['admin'] = true;
					$_SESSION['admin_id'] = $admin_id;
					header("Location: /cabinet/admin");
				} else {
					header("Location: /");
				}
			}

			include_once(ROOT.'/views/cabinet/adminLogin.php');
			return true;
		}

		public function actionAdminLogout(){
			if (isset($_SESSION['admin'])){
				unset($_SESSION['admin']);
				unset($_SESSION['admin_id']);
				header("Location: /cabinet/admin/login");
			}
			return true;
		}

	}
?>