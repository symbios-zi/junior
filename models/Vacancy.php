<?php

	class Vacancy {
		const SHOW_BY_DEFAULT = 10;

		public static function add($user_id, $user_name, $img, $img_type, $title, $category, $salary, $salary_params, $geo,
															$old, $desc, $date_start, $date_end, $date_daily, $vk, $whatsapp, $telegram, $vk_id, $tel){

			$ending_vacancy = '';
			if ($date_daily){
				$ending_vacancy = date('Y-m-d', strtotime ('+30day'));
			} else {
				$ending_vacancy = $date_end;
			}

			$status_added = false;
			$img_name = '';
			if ($img){
				$name = $user_id.$category.date('mdys').rand(1, 99);
				$result_status = self::saveImage($name, $img, $img_type);
				// echo "Vacancy:add - Есть изобр.<br>";
				if ($result_status) {
					$img_name = $name;
					// echo "Vacancy:add - Сохранено.<br>";
				}
			}

			$status = '0';
			if (isset($_SESSION['admin'])){
				$status = '1';
			}

			$db = Db::getConnection();
			$sql = "INSERT INTO `vacancies` 
			(user_id, name, status, ending_vacancy, img, title, category, geo, salary, salary_params, old, description, date_start, date_end, date_daily, vk, whatsapp, telegram, vk_id, tel)
			VALUES(:user_id, :user_name, '$status', '$ending_vacancy', '$img_name', :title, :category, :geo, :salary, :salary_params, :old, :description, :date_start, :date_end, :date_daily, :vk, :whatsapp, :telegram, :vk_id, :tel)";

			$result = $db->prepare($sql);
			$result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$result->bindParam(':title', $title, PDO::PARAM_STR);
			$result->bindParam(':category', $category, PDO::PARAM_INT);
			$result->bindParam(':geo', $geo, PDO::PARAM_STR);
			$result->bindParam(':salary', $salary, PDO::PARAM_INT);
			$result->bindParam(':salary_params', $salary_params, PDO::PARAM_INT);
			$result->bindParam(':old', $old, PDO::PARAM_INT);
			$result->bindParam(':description', $desc, PDO::PARAM_STR);
			$result->bindParam(':date_start', $date_start, PDO::PARAM_STR);
			$result->bindParam(':date_end', $date_end, PDO::PARAM_STR);
			$result->bindParam(':date_daily', $date_daily, PDO::PARAM_STR);
			$result->bindParam(':vk', $vk, PDO::PARAM_STR);
			$result->bindParam(':whatsapp', $whatsapp, PDO::PARAM_STR);
			$result->bindParam(':telegram', $telegram, PDO::PARAM_STR);
			$result->bindParam(':vk_id', $vk_id, PDO::PARAM_STR);
			$result->bindParam(':tel', $tel, PDO::PARAM_STR);

			$result->execute();
			if($result->rowCount() > 0){
				$status_added = true;
			}

			return $status_added;
		}

		public static function update($id, $user_id, $user_name, $img, $img_type, $current_img_name, $title, $category, $salary, $salary_params, $geo, $old, $desc, $date_start, $date_end, $date_daily, $vk, $whatsapp, $telegram, $vk_id, $tel){

		if ($img){
				$name = strlen($current_img_name) > 8 ? $current_img_name : $user_id.$category.date('mdys').rand(1, 99);
				$result_status = self::saveImage($name, $img, $img_type);
				// if ($result_status) {
				// }
			}

			$status = false;
			$db = Db::getConnection();

			$sql = "UPDATE `vacancies` 
			SET status = '0', title = :title, category = :category, geo = :geo, salary = :salary, 
			salary_params = :salary_params, old = :old, description = :description, date_start = :date_start, 
			date_end = :date_end, date_daily = :date_daily, vk = :vk, whatsapp = :whatsapp, telegram = :telegram, 
			vk_id = :vk_id, tel = :tel ";
				if ($img) $sql .= ", img = '$name' ";
			$sql .= "WHERE id = :id";

			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->bindParam(':title', $title, PDO::PARAM_STR);
			$result->bindParam(':category', $category, PDO::PARAM_INT);
			$result->bindParam(':geo', $geo, PDO::PARAM_STR);
			$result->bindParam(':salary', $salary, PDO::PARAM_INT);
			$result->bindParam(':salary_params', $salary_params, PDO::PARAM_INT);
			$result->bindParam(':old', $old, PDO::PARAM_INT);
			$result->bindParam(':description', $desc, PDO::PARAM_STR);
			$result->bindParam(':date_start', $date_start, PDO::PARAM_STR);
			$result->bindParam(':date_end', $date_end, PDO::PARAM_STR);
			$result->bindParam(':date_daily', $date_daily, PDO::PARAM_STR);
			$result->bindParam(':vk', $vk, PDO::PARAM_STR);
			$result->bindParam(':whatsapp', $whatsapp, PDO::PARAM_STR);
			$result->bindParam(':telegram', $telegram, PDO::PARAM_STR);
			$result->bindParam(':vk_id', $vk_id, PDO::PARAM_STR);
			$result->bindParam(':tel', $tel, PDO::PARAM_STR);

			$result->execute();

		if($result->rowCount() > 0){
			$status = true;
		}
	return $status;
}

		public static function saveImage($img_name, $tmp_name, $img_type = 'image/jpeg') {
			$path = 'uploads/'.$img_name.'.jpg';
			$result = self::imageresize("uploads/".$img_name.".jpg", $tmp_name, $img_type, 100, 100,100);
			// imagecopy("uploads/testResize.jpg", "uploads/test(copyCenter).jpg", 0, 0, 20, 13, 80, 80);
			return $result;
		}

		private static function imageresize($outfile,$infile,$img_type,$neww,$newh,$quality) {
			// echo "<h5> Image type - ".$img_type,"</h5><br>";
			// echo "<h5> Outfile - ".$outfile,"</h5><br>";
			// echo "<h5> Infile - ".$infile,"</h5><br>";

			$im=null;
			if ($img_type == 'image/jpeg'){
				$im=imagecreatefromjpeg($infile);
			}
			if ($img_type == 'image/jpg'){
				$im=imagecreatefromjpeg($infile);
			}
	    if ($img_type == 'image/png'){
				$im=imagecreatefrompng($infile);
				imageAlphaBlending($im, false);
				imageSaveAlpha($im, true);
			}
	    $k1=$neww/imagesx($im);
	    $k2=$newh/imagesy($im);
	    $k=$k1>$k2?$k2:$k1;

	    $w=intval(imagesx($im)*$k);
	    $h=intval(imagesy($im)*$k);

	    $im1=imagecreatetruecolor(80,80);
	    $white = imagecolorallocate($im1, 255, 255, 255);
	    imagefill($im1, 0, 0, $white);

	    list($width, $height) = getimagesize($infile);
	    $qx = (imagesx($im) / 2) - (imagesy($im) / 2);
	    $qy = imagesy($im) / 2;

	    $result = imagecopyresampled($im1,$im,0,0,$qx,0,80,80,imagesy($im),imagesy($im));
	    // echo "Результат imagecopyresampled - ".$result;

	    imagejpeg($im1,$outfile,$quality);
	    imagedestroy($im);
	    imagedestroy($im1);

	    return $result;
    }


		public static function getLast($page = 1) {
			$page = intval($page);
			$offset = ($page-1) * self::SHOW_BY_DEFAULT;

			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE status = '1' ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset;
			$vacancyes = array();

			$result = $db->query($sql);

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['salary'] = $row['salary'];
				$vacancyes[$i]['salary_params'] = $row['salary_params'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['date_start'] = $row['date_start'];
				$vacancyes[$i]['date_end'] = $row['date_end'];
				$vacancyes[$i]['dd'] = $row['date_daily'];
				$i++;
			}

			return $vacancyes;
		}

		public static function getCountLast(){
			$db = DB::getConnection();

			$result = $db->query("SELECT count(id) AS count FROM `vacancies` WHERE status='1' ");
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$row = $result->fetch();

				return $row['count'];
		}



		public static function getByCategory($category, $page = 1){
			$db = Db::getConnection();
			$page = intval($page);
			$offset = ($page-1) * self::SHOW_BY_DEFAULT;

			$findcategory = Categories::getAllGroupByNum($category);
			$sql = "SELECT * FROM `vacancies` WHERE status = '1' AND ".$findcategory." ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset;

			$vacancyes = array();
			$result = $db->query($sql);

		if ($result){
			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['salary'] = $row['salary'];
				$vacancyes[$i]['salary_params'] = $row['salary_params'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['date_start'] = $row['date_start'];
				$vacancyes[$i]['date_end'] = $row['date_end'];
				$vacancyes[$i]['dd'] = $row['date_daily'];
				$i++;
			}
		}

			return $vacancyes;
		}

		public static function getCountByCategory($category){
			$db = Db::getConnection();
				$findcategory = Categories::getAllGroupByNum($category);
				$result = $db->query("SELECT count(id) AS count FROM `vacancies` WHERE status = '1' AND ".$findcategory);
				$result->setFetchMode(PDO::FETCH_ASSOC);
				$row = $result->fetch();
			return $row['count'];
		}



		public static function getByParams($category, $title, $ds, $df, $ss, $sp, $geo, $old, $dd, $page = 1) {
			$page = intval($page);
			$offset = ($page-1) * self::SHOW_BY_DEFAULT;

			$sql = "SELECT * FROM `vacancies` WHERE status = '1'";

			if ($category) {
				$findcategory = Categories::getAllGroupByNum($category);
				$sql .= " AND (".$findcategory.") ";
			}

			if ($ds and $df){
				$sql .= " AND ((date_start >= '$ds' AND date_start < '$df') OR (date_start <= '$ds' AND date_end >= '$df') OR (date_end > '$ds' AND date_end <= '$df') OR (date_start >= '$ds' AND date_end <= '$df'))";
			} else {
				if ($ds) $sql .= " AND date_start >= DATE('".$ds."')";
				if ($df) $sql .= " AND date_end <= DATE('".$df."')";
			}

			if ($dd) $sql .= " AND date_daily = '$dd'";


			if ($ss) $sql .= " AND salary >= '$ss'";
			if ($sp) $sql .= " AND salary_params = '$sp'";

			if ($geo && $geo != 'all') $sql .= " AND geo = '$geo'";

			if ($old) {
				if($old == '14-16' || $old == '16-18') $sql .= " AND old = '$old'";
				//if($old == '14') $sql .= " AND (old = '14' OR old = '16' OR old = '18' OR old = '14-16' OR old = '16-18')";
				if($old == '16') $sql .= " AND (old = '16-18' OR old = '16')";
				if($old == '18') $sql .= " AND old = '18'";
			}

			if ($title) {
			$title = CheckData::clean($title);
			$keywords = explode(' ', $title);

				foreach ($keywords as $key => $value) {
					if (!isset($keywords[$key - 1])) $sql .= " AND (";
					if (isset($keywords[$key - 1])) $sql .= " OR ";
							$sql .= " (title LIKE '%$value%') ";
					if (!isset($keywords[$key + 1])) $sql .= ")";
				}
			}

			$sql .= " ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset;


			$db = Db::getConnection();

			$vacancyes = array();
			$result = $db->query($sql);

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['salary'] = $row['salary'];
				$vacancyes[$i]['salary_params'] = $row['salary_params'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['date_start'] = $row['date_start'];
				$vacancyes[$i]['date_end'] = $row['date_end'];
				$vacancyes[$i]['dd'] = $row['date_daily'];
				$i++;
			}

			return $vacancyes;
		}

		public static function getCountByParams($category, $title, $ds, $df, $ss, $sp, $geo, $old, $dd) {

			$sql = "SELECT count(id) AS count FROM `vacancies` WHERE status = '1' ";

			if ($category) {
				$findcategory = '';
				$findcategory = Categories::getAllGroupByNum($category);
				$sql .= " AND (".$findcategory.") ";
			}

			if ($ds and $df){
				$sql .= " AND ((date_start >= '$ds' AND date_start < '$df') OR (date_start <= '$ds' AND date_end >= '$df') OR (date_end > '$ds' AND date_end <= '$df') OR (date_start >= '$ds' AND date_end <= '$df'))";
			} else {
				if ($ds) $sql .= " AND date_start >= DATE('".$ds."')";
				if ($df) $sql .= " AND date_end <= DATE('".$df."')";
			}

			if ($dd) $sql .= " AND date_daily = '$dd'";


			if ($ss) $sql .= " AND salary >= '$ss'";
			if ($sp) $sql .= " AND salary_params = '$sp'";

			if ($geo && $geo != 'all') $sql .= " AND geo = '".$geo."'";

			if ($old) {
				if($old == '14-16' || $old == '16-18') $sql .= " AND old = '$old'";
				if($old == '16') $sql .= " AND (old = '16-18' OR old = '16')";
				if($old == '18') $sql .= " AND old = '18'";
			}

			if ($title) {
			$title = CheckData::clean($title);
			$keywords = explode(' ', $title);

				foreach ($keywords as $key => $value) {
					if (!isset($keywords[$key - 1])) $sql .= " AND (";
					if (isset($keywords[$key - 1])) $sql .= " OR ";
							$sql .= " (title LIKE '%$value%') ";
					if (!isset($keywords[$key + 1])) $sql .= ")";
				}
			}

			$db = Db::getConnection();
			$result = $db->query($sql);
				$row = $result->fetch();
			return $row['count'];
		}



		public static function getById($id) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE id = '$id' AND status = '1'";

			$result = $db -> query($sql);
			return $result -> fetch();
		}

		public static function getByIdForEdit($id) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE id = '$id' AND (status = '0' OR status = '1' OR status = '2')";

			$result = $db -> query($sql);
			return $result -> fetch();
		}

		public static function getPhone($id) {
			$db = Db::getConnection();
			$sql = "SELECT name, vk_id, tel FROM `vacancies` WHERE id = '$id' AND status = '1'";

			$data = array();
			$result = $db -> query($sql);
			$row = $result -> fetch();
			$data['tel'] = $row['tel'];
			$data['vk_id'] = $row['vk_id'];
			$data['name'] = $row['name'];
			return $data;
		}

		public static function getRelatives($currentId, $category, $old, $df) {
			$db = Db::getConnection();
			$groupcategory = Categories::getNumGroupByOne($category);
			$findcategory = Categories::getAllGroupByNum($category);

			$sql = "SELECT * FROM `vacancies` WHERE status = '1' ";
			// $sql .= "AND (".$findcategory." AND old <= '$old' AND date_end > '$df') ";
			$sql .= "AND ".$findcategory." AND id not like '$currentId'";
			// $sql .= "OR  (old <= '$old' AND date_end > '$df') LIMIT 3";
			// Вверхняя строка добавляет нестрогий запрос

			// $sql = "SELECT * FROM `vacancies` WHERE status = '1' ";
			// $sql .= "AND (category = '$category' AND old <= '$old' AND date_end > '$df') ";
			// $sql .= "OR  (old <= '$old' AND date_end > '$df') LIMIT 3";

			$result = $db -> query($sql);
			$vacancyes = array();

			$i = 0;
			while($row = $result -> fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'] ? $row['img'] : $row['category'];
				$vacancyes[$i]['category'] = mb_substr(Categories::getNameByNum($row['category']), 0, 13).'.';
				$vacancyes[$i]['geo'] = $row['geo'];
				if($row['geo'] != 'Не определено') $vacancyes[$i]['geo'] .= ' р-н.';
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$vacancyes[$i]['old'] = $row['old'].'+';
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$i++;
			}
			return $vacancyes;
		}

		// Вакансии для Кабинета
		public static function getActive($user_id) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE user_id = '$user_id' AND (status = '0' OR status = '1') ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['status'] = $row['status'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['ending_vacancy'] = str_replace('-', '', $row['ending_vacancy']);
				// $vacancyes[$i]['category'] = mb_substr(Categories::getNameByNum($row['category']), 0, 13).'.';
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$i++;
			}
			return $vacancyes;
		}

		public static function getModeration($user_id) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE user_id = '$user_id' AND status = '0' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$i++;
			}
			return $vacancyes;
		}

		public static function getBlocked($user_id) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE user_id = '$user_id' AND status = '2' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['blocked_alert'] = self::getBlockedAlert($row['blocked_code']);
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$i++;
			}
			return $vacancyes;
		}

		public static function getBlockedCount($user_id) {
			$db = Db::getConnection();
			$sql = "SELECT count(id) AS count FROM `vacancies` WHERE user_id = '$user_id' AND status = '2'";
			$result = $db->query($sql);
			$row = $result->fetch();
			return $row['count'];
		}

		public static function getOld($user_id) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE user_id = '$user_id' AND status = '3' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$i++;
			}
			return $vacancyes;
		}

		public static function getBlockedAlert($code) {
			switch ($code) {
				case '0':
					return '';
					break;
				case '1':
					return 'Повторная подача объявления';
					break;
				case '2':
					return 'Указан неверный номер';
					break;
				case '2':
					return 'Ссылка на страницу ВК указана не верно';
					break;
				case '4':
					return 'Сомнительно большая зарплата';
					break;
				case '5':
					return 'Вакансия похожа на лохотрон';
					break;
				case '6':
					return 'Вакансия противоречит правилам размещения вакансий на нашем сайте';
					break;
			}
		}

		public static function delete($vacancy_id, $user_id) {
			$db = Db::getConnection();
			$sql = "DELETE FROM `vacancies` WHERE id = '$vacancy_id' AND user_id = '$user_id'";
			$result = $db->prepare($sql);
			$result->execute();
			$count = $result->rowCount();

			if (!$count)
				exit(header("Location: /403"));
			exit(header("Location: /cabinet"));
		}

		public static function stop($vacancy_id, $user_id) {
			$db = Db::getConnection();
			$sql = "UPDATE `vacancies` SET status = '3' WHERE id = '$vacancy_id' AND user_id = '$user_id'";
			$result = $db->prepare($sql);
			$result->execute();
			$count = $result->rowCount();

			if (!$count)
				exit(header("Location: /403"));
			exit(header("Location: /cabinet"));
		}
		// //Вакансии для Кабинета

		public static function getDate($ds, $df, $dd) {
			if ($dd) {
				return 'постоянно';
			} else {
				$date = '';
				$segments_s = explode('-', $ds);
				$segments_f = explode('-', $df);

				$date .= $segments_s[2];
				$date .= '.'.$segments_s[1];
				$date .= '.'.substr($segments_s[0], 2);

				$date .= ' - ';

				$date .= $segments_f[2];
				$date .= '.'.$segments_f[1];
				$date .= '.'.substr($segments_f[0], 2);

				return $date;
			}
		}

		public static function getSParams($num) {
			switch ($num) {
				case 1:
					return 'час';
					break;
				
				case 2:
					return 'день';
					break;

				case 3:
					return 'неделю';
					break;

				case 4:
					return 'месяц';
					break;
			}
		}

		public static function checkRights($vacancy_id){
			$user_id = $_SESSION['user']['id'];
			$db = Db::getConnection();
			$sql = "SELECT COUNT(id) FROM `vacancies` WHERE id = '$vacancy_id' AND user_id = '$user_id'";
			$result = $db->query($sql);
			$count = $result->fetch();

			if ($count[0])
				return true;
			exit(header("Location: /403"));
		}

		// Админка
		public static function getAllModeration() {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE status = '0' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['description'] = $row['description'];
				$vacancyes[$i]['date_daily'] = $row['date_daily'];
				$vacancyes[$i]['tel'] = $row['tel'];
				$vacancyes[$i]['vk_id'] = $row['vk_id'];
				$vacancyes[$i]['whatsapp'] = $row['whatsapp'];
				$vacancyes[$i]['telegram'] = $row['telegram'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$vacancyes[$i]['ending_vacancy'] = str_replace('-', '', $row['ending_vacancy']);
				$i++;
			}
			return $vacancyes;
		}

		public static function getAllActive() {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE status = '1' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['description'] = $row['description'];
				$vacancyes[$i]['date_daily'] = $row['date_daily'];
				$vacancyes[$i]['tel'] = $row['tel'];
				$vacancyes[$i]['vk_id'] = self::shortVk($row['vk_id']);
				$vacancyes[$i]['whatsapp'] = $row['whatsapp'];
				$vacancyes[$i]['telegram'] = $row['telegram'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$vacancyes[$i]['ending_vacancy'] = str_replace('-', '', $row['ending_vacancy']);
				$i++;
			}
			return $vacancyes;
		}
		private static function shortVk($vk){
			$pos = strpos($vk, '//') + 2;
			return substr($vk, $pos);
		}

		public static function getAllBlocked() {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE status = '2' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['blocked_alert'] = self::getBlockedAlert($row['blocked_code']);
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['description'] = $row['description'];
				$vacancyes[$i]['date_daily'] = $row['date_daily'];
				$vacancyes[$i]['tel'] = $row['tel'];
				$vacancyes[$i]['vk_id'] = $row['vk_id'];
				$vacancyes[$i]['whatsapp'] = $row['whatsapp'];
				$vacancyes[$i]['telegram'] = $row['telegram'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$vacancyes[$i]['ending_vacancy'] = str_replace('-', '', $row['ending_vacancy']);
				$i++;
			}
			return $vacancyes;
		}

		public static function getAllOld() {
			$db = Db::getConnection();
			$sql = "SELECT * FROM `vacancies` WHERE status = '3' ORDER BY id DESC";
			$result = $db->query($sql);
			$vacancyes = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$vacancyes[$i]['id'] = $row['id'];
				$vacancyes[$i]['blocked_alert'] = self::getBlockedAlert($row['blocked_code']);
				$vacancyes[$i]['img'] = $row['img'];
				$vacancyes[$i]['title'] = $row['title'];
				$vacancyes[$i]['category'] = $row['category'];
				$vacancyes[$i]['geo'] = $row['geo'];
				$vacancyes[$i]['old'] = $row['old'];
				$vacancyes[$i]['description'] = $row['description'];
				$vacancyes[$i]['date_daily'] = $row['date_daily'];
				$vacancyes[$i]['tel'] = $row['tel'];
				$vacancyes[$i]['vk_id'] = $row['vk_id'];
				$vacancyes[$i]['whatsapp'] = $row['whatsapp'];
				$vacancyes[$i]['telegram'] = $row['telegram'];
				$vacancyes[$i]['salary'] = $row['salary'].' руб/'.self::getSParams($row['salary_params']);
				$vacancyes[$i]['date'] = self::getDate($row['date_start'], $row['date_end'], $row['date_daily']);
				$i++;
			}
			return $vacancyes;
		}



		public static function adminDoSuccess($id){
			$db = Db::getConnection();
			$db->query("UPDATE `vacancies` SET status = '1' WHERE id = '$id'");
		}

		public static function adminDoDelete($id){
			$db = Db::getConnection();
			$result = $db->prepare("DELETE FROM `vacancies` WHERE id = '$id'");
			$result->execute();
		}

		public static function adminDoBlocked($id, $code){
			$db = Db::getConnection();
			$db->query("UPDATE `vacancies` SET status = '2', blocked_code = '$code' WHERE id = '$id'");
		}

		public static function adminDoStopped(){
			$db = Db::getConnection();
			$curdate = date('Y-m-d');
			$db->query("UPDATE `vacancies` SET status = '3' WHERE ending_vacancy <= '$curdate'");
		}

		public static function getCount($type){
			if ($type == 'moderation' || $type == 'active' || $type == 'blocked'){
				if ($type == 'moderation') $status = 0;
				if ($type == 'active') $status = 1;
				if ($type == 'blocked') $status = 2;
					$db = Db::getConnection();
					$result = $db->query("SELECT count(id) AS count FROM `vacancies` WHERE status = '$status'");
					$row = $result->fetch();
				return $row['count'];
			}
		}

	}
?>