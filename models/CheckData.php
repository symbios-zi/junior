<?php

	class CheckData {

		public static function clean($str) {
			$result = trim($str);
			$result = strip_tags($result);
			$result = htmlspecialchars($result);
			$result = stripslashes($result);
			return $result;
		}

		public static function title($str) {
			if (mb_strlen($str, 'utf-8') < 7 || mb_strlen($str, 'utf-8') > 47){
				return false;
			}
			$title = self::clean($str);
			$title = mb_strtolower($title, 'UTF-8');
			$all_text = $title;
			$first = mb_substr($title, 0, 1, 'UTF-8');
			$first = mb_strtoupper($first, 'UTF-8');
			$text = mb_substr($title, 1);
			return $first.$text;
		}

		public static function description($str) {
			$desc = self::clean($str);
			if (mb_strlen($str, 'utf-8') > 1200){
				return false;
			}
			return $desc;
		}

		public static function salary($str) {
			$salary = self::clean($str);
			if (strlen($salary) < 2 || strlen($salary) > 5){
				return false;
			}
			return $salary;
		}

		public static function date($str) {
			$date = self::clean($str);
			if (strlen($date) > 10 || strlen($date) < 10){
				return false;
			}
			return $date;
		}

		public static function vkId($str) {
			$pattern = 'vk.com';
			if (preg_match("~$pattern~", $str)) {
				return $str;
			}
			return false;
		}

		public static function img($name, $type, $size) {
		$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm", ".js");
		$errors = [];
			foreach ($blacklist as $item){
    		if(preg_match("/$item\$/i", $name)) {
    			$errors['image'] = "Неверный тип файла.";
    		}
    	}
				if ($size > 1048576) {
				$errors['image'] = "Размер больше 1Мб";
			}
				if ($type != 'image/jpeg' && $type != 'image/png') {
					$errors['image'] = "Неверный тип файла.";
				}
			if (count($errors) == 0){
				$errors = false;
			}
			return $errors;
		}

	}
?>