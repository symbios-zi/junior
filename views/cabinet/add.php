<?php header('Content-Type: text/html; charset= utf-8'); ?>
<?php 
$meta_title = $id ? 'Редактировать вакансию' : 'Добавить вакансию';
Layouts::head($meta_title, '', '');
?>
<?php include ROOT . '/views/layouts/header-test.php'; ?>


<div class="container">

	<div class="row">
		<div class="col-lg-9 col-lg-offset-1">
			<div class="add-wrapper">
				<div class="row"><div class="col-lg-12"> 
					<div class="bread-prev flex-parent">
						<a href="javascript:history.back();">
							<span class="full-advert-back"><span class="full-advert-icon icon-back-green"></span>Назад</span>
						</a>
					</div>
					<?php if(isset($_SESSION['admin'])):?><h2 class="add-title">Админка</h2><?php endif;?>
					<h2 class="add-title"><?php if($id) echo 'Редактировать вакансию'; else echo 'Добавить вакансию';?></h2> 
				</div></div>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
							<form action="" id="add-form" method="POST" enctype="multipart/form-data"></form>
							<input type="text" form="add-form" id='add-title' class="add-name <?php if(array_key_exists('title', $errors)) echo 'inp-error'; ?>" name="title" placeholder="<?php if(array_key_exists('title', $errors)){ echo 'От 7 до 47 символов!!!';} else echo 'Название вакансии' ?>" value="<?php echo $title; ?>">
							<div id="add-title-help"></div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1" id="add-title-help"></div>
					</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-bars add-icon"></i>Категория</label></div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
								<div class="add-category-wrap">
									<select id="add-category" name="category" form="add-form"
									class="<?php if(array_key_exists('category', $errors)) echo 'inp-error'; ?>">
										<option value="" align="center">Любая категория</option>

							<option value="1" disabled <?php if ($category == '1') echo 'selected'; ?> class="category-group">Торговля</option>
							<option value="4" <?php if ($category == '4') echo 'selected'; ?>>Администратор</option>
							<option value="5" <?php if ($category == '5') echo 'selected'; ?>>Продавец</option>
							<option value="6" <?php if ($category == '6') echo 'selected'; ?>>Продавец-консультант</option>
							<option value="7" <?php if ($category == '7') echo 'selected'; ?>>Кассир</option>
							<option value="8" <?php if ($category == '8') echo 'selected'; ?>>Менеджер</option>
							<option value="9" <?php if ($category == '9') echo 'selected'; ?>>Оператор call-центра</option>
							<option value="10" <?php if ($category == '10') echo 'selected'; ?>>Мерчендайзер</option>

							<option value="2" disabled <?php if ($category == '2') echo 'selected'; ?> class="category-group">Рестораны/Отели/Кафе</option>
							<option value="11" <?php if ($category == '11') echo 'selected'; ?>>Бармен</option>
							<option value="12" <?php if ($category == '12') echo 'selected'; ?>>Бариста</option>
							<option value="13" <?php if ($category == '13') echo 'selected'; ?>>Официант</option>
							<option value="14" <?php if ($category == '14') echo 'selected'; ?>>Повар</option>
							<option value="15" <?php if ($category == '15') echo 'selected'; ?>>Курьер</option>
							<option value="16" <?php if ($category == '16') echo 'selected'; ?>>Кальянщик</option>
							<option value="17" <?php if ($category == '17') echo 'selected'; ?>>Хостес</option>
							<option value="18" <?php if ($category == '18') echo 'selected'; ?>>Обслуживающий персонал</option>

							<option value="3" disabled <?php if ($category == '3') echo 'selected'; ?> class="category-group">Другое</option>
							<option value="19" <?php if ($category == '19') echo 'selected'; ?> >Промоутер</option>
							<option value="20" <?php if ($category == '20') echo 'selected'; ?>>Расклейщик</option>
							<option value="21" <?php if ($category == '21') echo 'selected'; ?>>Автомойщик</option>
							<option value="22" <?php if ($category == '22') echo 'selected'; ?>>Разнорабочий</option>
							<option value="23" <?php if ($category == '23') echo 'selected'; ?>>Грузчик</option>
							<option value="24" <?php if ($category == '24') echo 'selected'; ?>>Охранник</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 visible-xs"></div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-map-marker add-icon"></i>Гео</label></div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
								<div class="add-category-wrap">
									<select name="geo" form="add-form" class="add-geo <?php if(array_key_exists('geo', $errors)) echo 'inp-error'; ?>">
						<option value="" class="params-geo-default">Выберите район</option>
						<option value="Не определено" <?php if($geo == 'Не определено') echo 'selected'; ?> >Не определено</option>
						<option value="Авиастр." <?php if($geo == 'Авиастр.') echo 'selected'; ?> >Авиастроительный р-н.</option>
						<option value="Кировский" <?php if($geo == 'Кировский') echo 'selected'; ?> >Кировский р-н.</option>
						<option value="Московский" <?php if($geo == 'Московский') echo 'selected'; ?> >Московский р-н.</option>
						<option value="Ново-Савин." <?php if($geo == 'Ново-Савин.') echo 'selected'; ?> >Ново-Савиновский р-н.</option>
						<option value="Приволжский" <?php if($geo == 'Приволжский') echo 'selected'; ?> >Приволжский р-н.</option>
						<option value="Советский" <?php if($geo == 'Советский') echo 'selected'; ?> >Советский р-н.</option>
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
									<input type="text" form="add-form" class="add-salary-inp 
									<?php if(array_key_exists('salary', $errors)) echo 'inp-error'; ?>" name="salary"
									value="<?php echo $salary; ?>" placeholder="руб" pattern="^[ 0-9]+$">
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-left:15px;">
								<div class="add-category-wrap">
									<select name="salary_params" form="add-form"
									class="add-sp <?php if(array_key_exists('salary_params', $errors)) echo 'inp-error'; ?>">
										<option value=''>ч/д/н/м</option>
										<option value="1" <?php if ($salary_params == '1') echo 'selected'; ?> >руб/час</option>
										<option value="2" <?php if ($salary_params == '2') echo 'selected'; ?> >руб/день</option>
										<option value="3" <?php if ($salary_params == '3') echo 'selected'; ?> >руб/неделю</option>
										<option value="4" <?php if ($salary_params == '4') echo 'selected'; ?> >руб/месяц</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 visible-xs"></div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
								<div class="pull-right"><label class="add-category"><i class="fa fa-user add-icon"></i>Возраст</label></div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
								<div class="add-category-wrap">
									<select name="old" form="add-form"
									class="add-old <?php if(array_key_exists('old', $errors)) echo 'inp-error'; ?>">
										<option value="">Выбрать</option>
										<option value="14-16" <?php if ($old == '14-16') echo 'selected'; ?> >14-16 лет</option>
										<option value="16-18" <?php if ($old == '16-18') echo 'selected'; ?> >16-18 лет</option>
										<!-- <option value="14" <?php //if ($old == '14') echo 'selected'; ?> >от 14 лет</option> -->
										<option value="16" <?php if ($old == '16') echo 'selected'; ?> >16+</option>
										<option value="18" <?php if ($old == '18') echo 'selected'; ?> >18+</option>
									</select>
								</div>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
						</div>


						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
								<textarea form="add-form" class="add-description" name="desc" rows="5" placeholder="Подробное описание вакансии"
								><?php echo $desc; ?></textarea>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1"></div>
						</div>


						<div class="row" style="margin-top: 20px;">
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
								<div class="pull-right"><label class="add-category test-date"><i class="fa fa-calendar add-icon"></i>Дата</label></div>
							</div>

							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 add-date-from-wrap" >
								<div class="add-category-wrap">
								<?php if(!$id):?>
									<input type="text" <?php if($id) echo " disabled='disabled'";?> name="date_start" form="add-form" 
									value="<?php echo $date_start; ?>"
									class="<?php if(!$id) echo 'add-datepicker-from add-ds';?> add-date-inp <?php if(array_key_exists('date_start', $errors)) echo ' inp-error'; if($id) echo ' unavailable';?>" placeholder="От" <?php if($id) echo " disabled";?> >
								<?php else:?>
									<div class="add-date-inp flex-parent" data-toggle="tooltip" title="Дату нельзя редактировать">
										<?php if($date_start == '0000-00-00') echo ''; else echo $date_start;?>
									</div>
									<input type="hidden" name="date_start" form="add-form" value="<?php echo $date_start; ?>">
								<?php endif;?>
								</div>
							</div>

							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 add-date-to-wrap" >
								<div class="add-category-wrap">
									<?php if(!$id):?>
									<input type="text" form="add-form" name="date_end" form="add-form" value="<?php echo $date_end; ?>"
									class="add-datepicker-to add-date-inp add-df <?php if(array_key_exists('date_end', $errors)) echo 'inp-error';?>" placeholder="До">
									<?php else:?>
										<div class="add-date-inp flex-parent" data-toggle="tooltip" title="Дату нельзя редактировать">
											<?php if($date_end == '0000-00-00') echo ''; else echo $date_end;?>
										</div>
										<input type="hidden" name="date_end" form="add-form" value="<?php echo $date_end; ?>">
									<?php endif;?>
								</div>
							</div>

							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
							<div class="col-xs-12 visible-xs"></div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="padding-left:0;">
								<div class="pull-right">
									<?php if($id && $date_daily):?>
										<label class="add-category"><span class="add-date-always">Постоянно</span>
											<label style="margin-bottom: 0;" data-toggle="tooltip" title="Дату нельзя редактировать">
												<input class="add-checkbox" id="checkbox-daily" type="checkbox" <?php if($date_daily) echo 'disabled';?> 
												form="add-form"
												name="date_daily" value="yes" <?php if ($date_daily) echo 'checked'; ?> >
												<div class="add-psevdo-checkbox"></div>
											</label>
										</label>
										<input type="hidden" name="date_daily" form="add-form" <?php if ($date_daily) echo 'checked'; ?>
										value="yes" <?php if ($date_daily) echo 'checked'; ?>>
								<?php endif;?>

								<?php if(!$id):?>
									<label class="add-category"><span class="add-date-always">Постоянно</span>
											<label style="margin-bottom: 0;">
												<input class="add-checkbox" id="checkbox-daily" type="checkbox"
												form="add-form"name="date_daily" value="yes">
												<div class="add-psevdo-checkbox"></div>
											</label>
									</label>
								<?php endif;?>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
									<div class="add-image-button add-img">
										<label>
											<input type="file" form="add-form"  name="image" id="add-img" accept="image/jpeg,image/png,image/gif">
												<?php if($id):?>
													<input type="hidden" form="add-form" name='current-img-name' value="<?php echo $img_name;?>">
												<?php endif; ?>
											<span>Выберите изображение</span>
										</label>
									</div>
								<div class="added-img-wrap">
									<?php if($id) echo "<img src='/uploads/$img_name.jpg' id='added-img'>";?>
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
									<input class="add-vk-check" type="checkbox" form="add-form" 
									name="vk" <?php if ($vk) echo 'checked'; ?>>
									<div class="add-contacts-icons flex-parent text-center"><i class="fa fa-vk ads-i-vk"></i></div>
								</label>
								<label>
									<input class="add-wa-check" type="checkbox" form="add-form" name="whatsapp" 
									<?php if ($whatsapp) echo 'checked'; ?>>
									<div class="add-contacts-icons flex-parent text-center"><i class="fa fa-whatsapp ads-i-wa"></i></div>
								</label>
								<label>
									<input class="add-tg-check" type="checkbox" form="add-form" name="telegram" 
									<?php if ($telegram) echo 'checked'; ?>>
									<div class="add-contacts-icons flex-parent text-center"><i class="fa fa-telegram ads-i-wa"></i></div>
								</label>
							</div>
							<div class="col-lg-2 col-lg-offset-1 col-md-2 col-sm-2 col-xs-6">
								<input class="add-tel <?php if (array_key_exists('tel', $errors)) echo 'inp-error'; ?>" value="<?php echo $tel; ?>" id="phone" type="text" form="add-form" name="tel" placeholder="+7(999) 999-99-99">
							</div>
							<div class="col-lg-1">
								<?php if (isset($_SESSION['admin'])):?>
									<input type="text" class="add-tel" form="add-form" name="user_name" placeholder="Имя" value="<?php echo $tel; ?>">
								<?php endif;?>
							</div>

							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-5">
								<div class="pull-right"><input type="submit" form="add-form" name="submit" class="add-go-button" 
									value="<?php if($id) echo 'Сохранить'; else echo 'Добавить';?>" <?php if($id) echo "id='edit-btn'";?> >
								</div>
								<div id="testing-edit"></div>
							</div>
							<div class="col-lg-1"></div>
						</div>

						<div class="row add-vk-id hidden">
							<div class="col-xs-6 col-sm-2 col-sm-offset-3 col-lg-2 col-lg-offset-3 add-vk-inp">
								<input type="text" name='vkid' form="add-form" class="add-vkid <?php if(array_key_exists('vk_id', $errors)) echo 'inp-error'; ?>" placeholder="<?php if(array_key_exists('vk_id', $errors)){ echo 'vk.com/ваш id';} else echo 'https://vk.com/...'?>" value="<?php echo $vkid; ?>">
							</div>
							<div class="col-xs-6 col-lg-7"></div>
						</div>

				</div>
			</div>
	</div>
</div>


<div style="margin-top: 800px;"></div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
<script src="/template/js/maskedinput.js"></script>
<script src="/template/library/date-picker/zebra_datepicker.js"></script>
<script src="/template/js/site/add.js"></script>
</div>

</body>
</html>