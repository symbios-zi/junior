<?php

	class Categories {

		public static function getByCategory($category) {
			$categories = include(ROOT.'/config/categories.php');
			$num = false;

			foreach ($categories as $isnumcategory => $namecategory) {
				if ($category == $namecategory) {
					$num = $isnumcategory;
				}
			}
			return $num;
		}

		public static function getByNum($num) {
			$categories = include(ROOT.'/config/categories.php');
			$category = false;

			foreach ($categories as $isnumcategory => $namecategory) {
				if ($num == $isnumcategory) {
					$category = $namecategory;
				}
			}
			return $category;
		}

		public static function getNameByNum($num) {
			$categories = include(ROOT.'/config/categoriesNames.php');
			$name = false;

			foreach ($categories as $isnumcategory => $namecategory) {
				if ($num == $isnumcategory) {
					$category = $namecategory;
				}
			}
			return $category;
		}

		public static function getAllGroupByNum($category) {
			$findcategory = '';
			switch ($category) {
				case 1:
					$findcategory = "category = '4' OR category = '5' OR category = '6' 
					OR category = '7' OR category = '8' OR category = '9' OR category = '10' ";
					break;

				case 2:
					$findcategory = "category = '11' OR category = '12' OR category = '13' OR category = '14' 
					OR category = '15' OR category = '16' OR category = '17' OR category = '18' ";
					break;

				case 3:
					$findcategory = "category = '19' OR category = '20' OR category = '21' 
					OR category = '22' OR category = '23' OR category = '24' ";
					break;

				default:
					$findcategory = "category = '$category' ";
					break;
			}

			return $findcategory;
		}

		public static function getNumGroupByOne($num) {
			if ($num == 4 || $num == 5 || $num == 6 || $num == 7 || $num == 8 || $num == 9 || $num == 10) {
				return 1;
			}
			if ($num == 11 || $num == 12 || $num == 13 || $num == 14 || $num == 15 || $num == 16 || $num == 17 || $num == 18) {
				return 2;
			}
			if ($num == 19 || $num == 20 || $num == 21 || $num == 22 || $num == 23 || $num == 24) {
				return 3;
			}
		}

		public static function doShort($name){
			if(mb_strlen($name, 'utf-8') > 14){
				return mb_substr($name, 0, 13).'.';
			} else {
				return $name;
			}
		}

	}
?>