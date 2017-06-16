<?php

	class User {

		public static function isGuest(){
			if (!isset($_SESSION['user']) && !isset($_SESSION['admin']))
				exit(header("Location: /"));
		}

		public static function isAdmin(){
			if (!isset($_SESSION['admin']))
				exit(header("Location: /"));
		}

		public static function isRegistered($uid){
			$db = Db::getConnection();
			$sql = "SELECT COUNT(DISTINCT '$uid') FROM `users`";

			$result = $db->query($sql);
			$count = $result->fetch();
			if ($count[0] != 0)
				return true;
			return false;
		}

		public static function registerByVk($uid, $name){
			$db = Db::getConnection();
			$sql = "INSERT INTO `users` (uid, name) VALUES (:uid, :name)";

			$result = $db->prepare($sql);
			$result->bindParam(':uid', $uid, PDO::PARAM_INT);
			$result->bindParam(':name', $name, PDO::PARAM_STR);
			$result->execute();
		}

		public static function updateDataByVk($uid, $name){
			$db = Db::getConnection();
			$sql = "SELECT id, name FROM `users` WHERE uid = '$uid'";
			$result = $db->query($sql);
			$data = $result->fetch();
			$_SESSION['user']['id']= $data['id'];

			if ($data['name'] != $name){
				$sql = "UPDATE `users` SET name = :name WHERE uid = :uid";
				$result = $db->prepare($sql);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				$result->bindParam(':uid', $uid, PDO::PARAM_INT);
				$result->execute();
			}
		}

		public static function login($login, $password){
			$status = false;
			$pass_encoded = self::password_encode($password);
			$db = Db::getConnection();
			$sql = "SELECT * FROM `users` WHERE email = '$login' AND password = '$pass_encoded'";
			$result = $db->query($sql);
			if ($result->rowCount() > 0){
				$row = $result->fetch();
				$status = array('id' => $row['id'], 'name' => $row['name']);
			}

			return $status;
		}

		public static function adminLogin($login, $password){
			$pass_encoded = self::password_encode($password);
			$db = Db::getConnection();
			$sql = "SELECT id FROM `admins` WHERE email = '$login' AND password = '$pass_encoded'";
			$result = $db->query($sql);
			$row = $result->fetch();
			if ($row['id']){
				return $row['id'];
			} else {
				return false;
			}
		}

		public static function register($name, $email, $password){
			$password = self::password_encode($password);
			$status = false;

			if (self::isUniqueEmail($email)){
				$db = Db::getConnection();
				$sql = "INSERT INTO `users` (name, email, password) VALUES (:name, :email, :password)";
				$result = $db->prepare($sql);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				$result->bindParam(':email', $email, PDO::PARAM_STR);
				$result->bindParam(':password', $password, PDO::PARAM_STR);

				$result->execute();
					if ($result->rowCount() == 1){
						$status = array('id' => $db->lastInsertId());
					}
			} else {
				$status = array('email' => true);
			}
			return $status;
		}

		public static function password_encode($password){
			return md5($password.'KdjXQo');
		}

		public static function isUniqueEmail($email){
			$db = Db::getConnection();
			$sql = "SELECT id FROM `users` WHERE email = '$email'";
			$result = $db->query($sql);
			$row = $result->fetch();
			if ($row['id']){
				return false;
			} else {
				return true;
			}
		}

		public static function getDataForProfile($user_id){
			$db = Db::getConnection();
			$sql = "SELECT uid, vk, name, email, tel FROM `users` WHERE id = '$user_id'";
			$row = $db->query($sql);
			return $row->fetch();
		}

		public static function profileUpdate($params){
			$user_id = $_SESSION['user']['id'];
			$db = Db::getConnection();
			$sql = "UPDATE `users` SET ";
			if(isset($params['name'])) $sql .="name = '$params[name]', ";
			if(isset($params['email'])) $sql .="email = '$params[email]', ";
			if(isset($params['tel'])) $sql .="tel = '$params[tel]', ";
			if(isset($params['vk'])) $sql .="vk = '$params[vk]' ";
			$sql.=" WHERE id = '$user_id'";
			$db->query($sql);

			if(isset($params['old_password']) && isset($params['new_password'])){
				$pass_encoded = self::password_encode($params['new_password']);
				$old_pass_encoded = self::password_encode($params['old_password']);
				$sql = "UPDATE `users` SET password = '$pass_encoded' WHERE id = '$user_id' AND password = '$old_pass_encoded'";
				$result = $db->prepare($sql);
				$result->execute();
				$count = $result->rowCount();
				if($count == 1)
					return true;
				return false;
			}
		}

}
?>