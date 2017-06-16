<?php header('Content-Type: text/html; charset= utf-8'); ?>
<?php include ROOT . '/views/layouts/header.php'; ?>


<div class="container">

	<div class="row">
		<div class="col-lg-9 col-lg-offset-1">
			<div class="add-wrapper">
				<div class="row"><div class="col-lg-12"> 
					<h2 class="add-title"><?php if($id) echo 'Редактировать вакансию'; else echo 'Добавить вакансию';?></h2> 
				</div></div>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
							<form action="" id="add-form" method="POST" enctype="multipart/form-data">
							<input id='add-title' class="add-name <?php if(array_key_exists('title', $errors)) echo 'inp-error'; ?>" type="text" name="title"
							placeholder="<?php if(array_key_exists('title', $errors)){ echo 'От 7 до 47 символов!!!';} else echo 'Название вакансии' ?>" value="<?php echo $title; ?>">
						</div>
						<div class="col-lg-1"></div>
					</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-bars add-icon"></i>Категория</label></div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
								<div class="add-category-wrap">
									<select id="add-category" name="category" class="<?php if(array_key_exists('category', $errors)) echo 'inp-error'; ?>">
										<option value="no" align="center">Выбрать</option>
										<option value="promoyter" <?php if($category == 'promoyter') echo "selected"; ?> >Промоутер</option>
										<option value="general-worker" <?php if($category == 'general-worker') echo "selected"; ?> >Разнорабочий</option>
										<option value="porter" <?php if($category == 'porter') echo "selected"; ?> >Грузчик</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 visible-xs"></div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-map-marker add-icon"></i>Гео</label></div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
								<div class="add-category-wrap">
									<select name="geo" class="add-geo <?php if(array_key_exists('geo', $errors)) echo 'inp-error'; ?>">
										<option value="no" align="center">Выбрать</option>
										<option value="Советский" <?php if($geo == 'Советский') echo "selected"; ?> >Советский р-н.</option>
										<option value="Вахитовский"
											<?php if($geo == 'Вахитовский') echo "selected"; ?> >Вахитовский р-н.</option>
										<option value="Московский" <?php if($geo == 'Московский') echo "selected"; ?> >Московский р-н.</option>
									</select>
								</div>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
						</div>



						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-money add-icon"></i>Зарплата</label></div>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2" style="padding-right:0;">
								<div class="add-category-wrap">
									<input class="add-salary-inp <?php if(array_key_exists('salary', $errors)) echo 'inp-error'; ?>" type="text" name="salary"
									value="<?php echo $salary; ?>" placeholder="руб">
								</div>
							</div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-left:15px;">
								<div class="add-category-wrap">
									<select name="salary_params"
									class="add-sp <?php if(array_key_exists('salary_params', $errors)) echo 'inp-error'; ?>">
										<option value="no">д/н/м</option>
										<option value="1" <?php if($salary_params == 1) echo "selected"; ?> >день</option>
										<option value="2" <?php if($salary_params == 2) echo "selected"; ?> >неделя</option>
										<option value="3" <?php if($salary_params == 3) echo "selected"; ?> >месяц</option>
									</select>
								</div>
							</div>

							<div class="col-xs-12 visible-xs"></div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-user add-icon"></i>Возраст</label></div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
								<div class="add-category-wrap">
									<select name="old"
									class="add-old <?php if(array_key_exists('old', $errors)) echo 'inp-error'; ?>">
										<option value="no">Выбрать</option>
										<option value="14" <?php if($old == 14) echo "selected"; ?> >от 14 лет</option>
										<option value="16" <?php if($old == 16) echo "selected"; ?> >от 16 лет</option>
										<option value="18" <?php if($old == 18) echo "selected"; ?> >от 18 лет</option>
									</select>
								</div>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
						</div>


						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-10 col-lg-offset-1">
								<textarea class="add-description" name="desc" rows="5" placeholder="Подробное описание вакансии"
								><?php echo $desc; ?></textarea>
							</div>
							<div class="col-lg-1"></div>
						</div>


						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
								<div class="pull-right"><label class="add-category test-date"><i class="fa fa-calendar add-icon"></i>Дата</label></div>
							</div>

							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 add-date-from-wrap" >
								<div class="add-category-wrap">
									<input type="text" name="date_start" form="add-form" value="<?php echo $date_start; ?>"
									class="add-datepicker-from add-date-inp add-ds <?php if(array_key_exists('date_start', $errors)) echo 'inp-error';?>" placeholder="От">
								</div>
							</div>

							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 add-date-to-wrap" >
								<div class="add-category-wrap">
									<input type="text" name="date_end" form="add-form" value="<?php echo $date_end; ?>"
									class="add-datepicker-to add-date-inp add-df <?php if(array_key_exists('date_end', $errors)) echo 'inp-error';?>" placeholder="До">
								</div>
							</div>

							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
							<div class="col-xs-12 visible-xs"></div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="padding-left:0;">
								<div class="pull-right">
									<label class="add-category"><span class="add-date-always">Постоянно</span>
										<label style="margin-bottom: 0;">
											<input class="add-checkbox" id="checkbox-daily" type="checkbox" 
											name="date_daily" value="yes" <?php if ($date_daily) echo 'checked'; ?> >
											<div class="add-psevdo-checkbox"></div>
										</label>
									</label>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
								<div class="add-image-button add-img">
									<label>
										<input type="file" name="image" id="add-img" accept="image/jpeg,image/png,image/gif">
										<span>Выберите изображение</span>
									</label>
								</div>
								<div class="added-img-wrap">
									<?php if($id) echo "<img src='/uploads/$id.jpg' id='added-img'>";?>
								</div>
									<?php if(array_key_exists('img', $errors)): ?>
										<div class="alert alert-danger"><?php echo $errors['img']; ?></div>
									<?php endif; ?>
								<?php if (is_array($img_err)):?>
									<?php foreach($img_err as $key => $value): ?>
										<div class="alert alert-danger">
											<?php echo $value; ?>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2"></div>
						</div>

						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-sm-offset-0 col-xs-5 col-xs-offset-1">
								<div class="pull-right"><label class="add-category"><i class="fa fa-phone add-icon"></i>Контакты</label></div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4" style="padding-left: 0;">
								<label>
									<input class="add-vk-check" type="checkbox" name="vk" <?php if ($vk) echo 'checked'; ?>>
									<div class="add-contacts-icons flex-parent text-center"><i class="fa fa-vk ads-i-vk"></i></div>
								</label>
								<label>
									<input class="add-wa-check" type="checkbox" name="whatsapp" <?php if ($whatsapp) echo 'checked'; ?>>
									<div class="add-contacts-icons flex-parent text-center"><i class="fa fa-whatsapp ads-i-wa"></i></div>
								</label>
								<label>
									<input class="add-tg-check" type="checkbox" name="telegram" <?php if ($telegram) echo 'checked'; ?>>
									<div class="add-contacts-icons flex-parent text-center"><i class="fa fa-telegram ads-i-wa"></i></div>
								</label>
							</div>
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-sm-2 col-xs-6">
								<input class="add-tel <?php if (array_key_exists('tel', $errors)) echo 'inp-error'; ?>" value="<?php echo $tel; ?>" id="phone" type="text" form="add-form" name="tel" placeholder="+7(999) 999-99-99">
							</div>
							<div class="col-lg-1"></div>

							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-5">
								<div class="pull-right"><input type="submit" name="submit" class="add-go-button" 
									value="<?php if($id) echo 'Сохранить'; else echo 'Добавить';?>" <?php if($id) echo "id='edit-btn'";?> >
								</div>
								</form>
								<div id="testing-edit"></div>
							</div>
							<div class="col-lg-1"></div>
						</div>

						<div class="row add-vk-id hidden">
							<div class="col-xs-6 col-sm-2 col-sm-offset-3 col-lg-2 col-lg-offset-3 add-vk-inp">
								<input name='vkid' form="add-form" class="add-vkid <?php if(array_key_exists('vk_id', $errors)) echo 'inp-error'; ?>" 
								placeholder="<?php if(array_key_exists('vk_id', $errors)){ echo 'vk.com/ваш id';} else echo 'Профиль в vk'?>" value="<?php echo $vkid; ?>">
							</div>
							<div class="col-xs-6 col-lg-7"></div>
						</div>

						<div class="row">
							<div class="col-lg-12 text-center hidden-lg hidden-md hidden-sm hidden-xs"> <!-- hidden-lg hidden-md hidden-sm hidden-xs -->
								<div class="alert alert-success">
									<?php echo $tmp_name; ?>
								</div>
								<?php if (is_array($imgInfo)):?>
									<?php foreach($imgInfo as $key => $value): ?>
										<div class="alert alert-danger"><?php echo $value; ?></div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>


				</div>
			</div>
		<div class="col-lg-2 hidden-lg hidden-md hidden-sm hidden-xs" style="margin-top: 100px;">
			<?php if (isset($errors) && is_array($errors)): ?>
									<?php foreach ($errors as $key => $value): ?>
										<div class="alert alert-danger" style="font-size: 12px;">
											<?php echo $value; ?>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<?php if($result): ?>
										<div class="alert alert-success">Все успешно!</div>
									<?php endif; ?>
								<?php endif; ?>
		</div>
	</div>
</div>

<div style="margin-top: 800px;"></div>

<?php include ROOT . '/views/layouts/footer.php'; ?>