<?php 
$categoryName = $category ? '- '.Categories::getNameByNum($category) : '';
$title = $category != '' ? 'Работа, '.$categoryName.' в Казани, все вакансии - dopjob.ru' : 'Работа в Казани, Заходи - Dopjob.ru';
$description = 'Работа в Казани '.$categoryName.'. Большой выбор вакансий в вашем городе. Быстрый поиск по парамтрам. Заходи на dopjob.ru';
$keywords = 'Работа в Казани, Вакансии в Казани, работа '.$categoryName.' в Казани, dopjob, dopjob.ru';
Layouts::head($title, $description, $keywords);
?>
<?php include ROOT . '/views/layouts/header-test.php'; ?>

<div class="main-wrapper">
	<div class="container">
		<div class="row hidden-xs" style="margin-top: 30px;">
			<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-3">
				<div class="main-category">
					<select form="search-form" name="category">
							<option value="" align="center">Любая категория</option>

							<option value="1" <?php if ($category == '1') echo 'selected'; ?> class="category-group">Торговля</option>
							<option value="4" <?php if ($category == '4') echo 'selected'; ?>>Администратор</option>
							<option value="5" <?php if ($category == '5') echo 'selected'; ?>>Продавец</option>
							<option value="6" <?php if ($category == '6') echo 'selected'; ?>>Продавец-консультант</option>
							<option value="7" <?php if ($category == '7') echo 'selected'; ?>>Кассир</option>
							<option value="8" <?php if ($category == '8') echo 'selected'; ?>>Менеджер</option>
							<option value="9" <?php if ($category == '9') echo 'selected'; ?>>Оператор call-центра</option>
							<option value="10" <?php if ($category == '10') echo 'selected'; ?>>Мерчендайзер</option>

							<option value="2" <?php if ($category == '2') echo 'selected'; ?> class="category-group">Рестораны/Отели/Кафе</option>
							<option value="11" <?php if ($category == '11') echo 'selected'; ?>>Бармен</option>
							<option value="12" <?php if ($category == '12') echo 'selected'; ?>>Бариста</option>
							<option value="13" <?php if ($category == '13') echo 'selected'; ?>>Официант</option>
							<option value="14" <?php if ($category == '14') echo 'selected'; ?>>Повар</option>
							<option value="15" <?php if ($category == '15') echo 'selected'; ?>>Курьер</option>
							<option value="16" <?php if ($category == '16') echo 'selected'; ?>>Кальянщик</option>
							<option value="17" <?php if ($category == '17') echo 'selected'; ?>>Хостес</option>
							<option value="18" <?php if ($category == '18') echo 'selected'; ?>>Обслуживающий персонал</option>

							<option value="3" <?php if ($category == '3') echo 'selected'; ?> class="category-group">Другое</option>
							<option value="19" <?php if ($category == '19') echo 'selected'; ?> >Промоутер</option>
							<option value="20" <?php if ($category == '20') echo 'selected'; ?>>Расклейщик</option>
							<option value="21" <?php if ($category == '21') echo 'selected'; ?>>Автомойщик</option>
							<option value="22" <?php if ($category == '22') echo 'selected'; ?>>Разнорабочий</option>
							<option value="23" <?php if ($category == '23') echo 'selected'; ?>>Грузчик</option>
							<option value="24" <?php if ($category == '24') echo 'selected'; ?>>Охранник</option>

						</select>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-5" style="padding-left:0; padding-right:45px;">
				<div class="main-search">
						<input class="main-search-inp disabled-xs" type="text" value="<?php echo $text; ?>" name="q" form="search-form" placeholder="Поиск вакансий">
						<img class="main-search-icon" src="/template/icons/search.png" alt="">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-3" style="padding-left:0; padding-right: 0; margin-left: -15px; position: relative; left: -20px;">
				<button type="submit" form="search-form" name="submit" value="go" class="search-button flex-parent">Найти</button>
					<div class="main-params flex-parent pull-right" id="params">
						<label>
							<span class="main-params-title">Параметры<img class="main-params-img" src="/template/icons/setting.png" alt="параметры"></span>
							<input type="checkbox" id="isParams">
						</label>
					</div>
			</div>
			<div class="col-lg-1 col-md-1 hidden-sm"></div>
			<div class="col-lg-2 col-md-2 hidden-sm" style="padding-left:0; padding-right:0; margin-left: -30px;">
				<div class="main-add-vacancy flex-parent">
						<a href="<?php if(isset($_SESSION['user'])) echo '/cabinet/add'; else echo '#authModal'; ?>" data-toggle="modal">
							<span>Добавить вакансию</span>
						</a>
						<img class="main-add-vacancy-img" src="/template/icons/plus.png" alt="plus">
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1"></div>
		</div>

<!-- Mobile menu -->
	<div class="container-fluid hidden-lg hidden-md hidden-sm">
		<div class="row" style="margin-top: 30px;">
			<div class="col-xs-12 m-search-wrap">
				<div class="m-search">
					<input class="main-search-inp disabled-lg" type="text" value="<?php echo $text; ?>" name="qm" form="search-form" placeholder="Поиск вакансий">
				</div>
				<div class="m-search-go flex-parent">
					<button type="submit" form="search-form" name="submit" value="go"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="m-params-w flex-parent" data-target="#navbarCollapse" data-toggle="collapse">
						<span><i class="fa fa-sliders m-params-icon"></i>Параметры</span>
					</div>
				</div>
			</div>
	</div>

<!-- Mobile params -->
<nav role="navigation" class="hidden-lg hidden-md hidden-sm">
  <!-- Навигационное меню -->
    <div id="navbarCollapse" class="collapse navbar-collapse m-all-params">
      <ul class="nav navbar-nav">
        <li>
        	<div class="params-tr">
							<span class="params-tr-name">Дата:</span>
							<input type="text" form="search-form" name="date_from" value="<?php echo $date_from; ?>"
							class="add-datepicker-from params-inp params-date_m disabled-lg">
							<span>-</span>
							<input type="text" form="search-form" name="date_to" value="<?php echo $date_to; ?>" class="add-datepicker-to params-inp params-date_m disabled-lg">
							<label class="date_daily" data-toggle="tooltip" title="Постоянная занятость">
								<input type="checkbox" form="search-form" name="dd" value="yes" class="params_dd_m disabled-lg" <?php if ($dd) echo 'checked'; ?> >
								<div class="date_daily_anchor"></div>
							</label>
						</div>
        </li>

        <li>
        	<div class="params-tr">
							<span class="params-tr-name">Зарплата:</span>
							<input type="text" form="search-form" name="salary_from" value="<?php echo $salary_from; ?>"
							class="params-salary form-control params-inp disabled-lg" placeholder="От" pattern="[0-9]{2-7}">
							<select form="search-form" class="form-control params-s-params params-inp disabled-lg" name="salary_p">
								<option value=''>ч/д/н/м</option>
								<option value="1" <?php if ($salary_p == '1') echo 'selected'; ?> >руб/час</option>
								<option value="2" <?php if ($salary_p == '2') echo 'selected'; ?> >руб/день</option>
								<option value="3" <?php if ($salary_p == '3') echo 'selected'; ?> >руб/неделю</option>
								<option value="4" <?php if ($salary_p == '4') echo 'selected'; ?> >руб/месяц</option>
							</select>
						</div>
						<hr class="params-divider">
        </li>

				<li>
					<div class="params-tr">
							<span class="params-tr-name">Гео:</span>
							<select form="search-form" class="form-control params-geo params-inp disabled-lg" name="geo">
								<option value="0" class="params-geo-default">Выберите район</option>
								<option value="Не определено" <?php if($geo == 'Не определено') echo 'selected'; ?> >Не определено</option>
								<option value="Авиастроительный" <?php if($geo == 'Авиастроительный') echo 'selected'; ?> >Авиастроительный</option>
								<option value="Кировский" <?php if($geo == 'Кировский') echo 'selected'; ?> >Кировский</option>
								<option value="Московский" <?php if($geo == 'Московский') echo 'selected'; ?> >Московский</option>
								<option value="Ново-Савиновский" <?php if($geo == 'Ново-Савиновский') echo 'selected'; ?> >Ново-Савиновский</option>
								<option value="Приволжский" <?php if($geo == 'Приволжский') echo 'selected'; ?> >Приволжский</option>
								<option value="Советский" <?php if($geo == 'Советский') echo 'selected'; ?> >Советский</option>
								<option value="all" <?php if($geo == 'all') echo 'selected'; ?> >Любой район</option>
							</select>
						</div>
						<hr class="params-divider">
				</li>

				<li>
					<div class="params-tr flex-parent">
							<span class="params-tr-name">Возраст:</span>
							<select form="search-form" name="old" class="form-control btn-default params-old disabled-lg">
								<option value="0" class="params-old-default">Возраст</option>
								<option value="14-16" <?php if ($old == '14-16') echo 'selected'; ?> >14-16 лет</option>
								<option value="16-18" <?php if ($old == '16-18') echo 'selected'; ?> >16-18 лет</option>
								<!-- <option value="14" <?php //if ($old == '14') echo 'selected'; ?> >от 14 лет</option> -->
								<option value="16" <?php if ($old == '16') echo 'selected'; ?> >16+</option>
								<option value="18" <?php if ($old == '18') echo 'selected'; ?> >18+</option>
							</select>
						</div>
						<hr class="params-divider">
				</li>

				<li>
					<button type="submit" name="submit" form="search-form" value="go" class="btn btn-success btn-sm params-go pull-right">
						Применить
					</button>
					<div class="m-params-clear params-clear pull-right"><i class="fa fa-trash-o"></i> Очистить</div>
				</li>
    </ul>

    </div>
</nav>
<!-- //Mobile params -->


<!-- Параметры -->
		<div class="row">
			<div class="col-lg-3 col-lg-offset-6 col-md-4 col-md-offset-6 col-sm-5 col-sm-offset-6 hidden-xs">
				<div class="params-menu animated hidden" data-effect="fadeInDown">
					<div class="params-menu-inner">
					<div class="params-close">X</div>
					<form action="/kazan/search" method="POST" id="search-form">
						<div class="params-tr">
							<span class="params-tr-name">Дата:</span>
							<input type="text" form="search-form" name="date_from" value="<?php echo $date_from; ?>"
							class="add-datepicker-from params-inp params-date disabled-xs">
							<span>-</span>
							<input type="text" form="search-form" name="date_to" value="<?php echo $date_to; ?>" class="add-datepicker-to params-inp params-date disabled-xs">
							<label class="date_daily" data-toggle="tooltip" title="Постоянная занятость">
								<input type="checkbox" name="dd" value="yes" form="search-form" class="params_dd disabled-xs" <?php if ($dd) echo 'checked'; ?> >
								<div class="date_daily_anchor"></div>
							</label>
						</div>
						<hr class="params-divider">
						<div class="params-tr">
							<span class="params-tr-name">Зарплата:</span>
							<input type="text" form="search-form" name="salary_from" value="<?php echo $salary_from; ?>"
							class="params-salary form-control params-inp disabled-xs" placeholder="От">
							<select form="search-form" class="form-control params-s-params params-inp disabled-xs" name="salary_p">
								<option value=''>ч/д/н/м</option>
								<option value="1" <?php if ($salary_p == '1') echo 'selected'; ?> >руб/час</option>
								<option value="2" <?php if ($salary_p == '2') echo 'selected'; ?> >руб/день</option>
								<option value="3" <?php if ($salary_p == '3') echo 'selected'; ?> >руб/неделю</option>
								<option value="4" <?php if ($salary_p == '4') echo 'selected'; ?> >руб/месяц</option>
							</select>
						</div>
						<hr class="params-divider">
						<div class="params-tr">
							<span class="params-tr-name">Гео:</span>
							<select form="search-form" class="form-control params-geo params-inp disabled-xs" name="geo">
								<option value="0" class="params-geo-default">Выберите район</option>
								<option value="Не определено" <?php if($geo == 'Не определено') echo 'selected'; ?> >Не определено</option>
								<option value="Авиастроительный" <?php if($geo == 'Авиастроительный') echo 'selected'; ?> >Авиастроительный</option>
								<option value="Кировский" <?php if($geo == 'Кировский') echo 'selected'; ?> >Кировский</option>
								<option value="Московский" <?php if($geo == 'Московский') echo 'selected'; ?> >Московский</option>
								<option value="Ново-Савиновский" <?php if($geo == 'Ново-Савиновский') echo 'selected'; ?> >Ново-Савиновский</option>
								<option value="Приволжский" <?php if($geo == 'Приволжский') echo 'selected'; ?> >Приволжский</option>
								<option value="Советский" <?php if($geo == 'Советский') echo 'selected'; ?> >Советский</option>
								<option value="all" <?php if($geo == 'all') echo 'selected'; ?> >Любой район</option>
							</select>
						</div>
						<hr class="params-divider">
						<div class="params-tr flex-parent">
							<span class="params-tr-name">Возраст:</span>
							<select form="search-form" name="old" class="form-control btn-default params-old disabled-xs">
								<option value="0" class="params-old-default">Возраст</option>
								<option value="14-16" <?php if ($old == '14-16') echo 'selected'; ?> >14-16 лет</option>
								<option value="16-18" <?php if ($old == '16-18') echo 'selected'; ?> >16-18 лет</option>
								<!-- <option value="14" <?php //if ($old == '14') echo 'selected'; ?> >от 14 лет</option> -->
								<option value="16" <?php if ($old == '16') echo 'selected'; ?> >16+</option>
								<option value="18" <?php if ($old == '18') echo 'selected'; ?> >18+</option>
							</select>
							</div>
							<hr class="params-divider">
							<div class="pull-right">
							<button type="submit" name="submit" form="search-form" value="go" class="btn btn-success btn-sm params-go">
								Применить
							</button>
							</div>
					</form>
					<div class="params-clear"><i class="fa fa-trash-o"></i> Очистить</div>
				</div>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>
<!-- //Параметры -->

<!-- Модальное окно - Вы не авторизированы -->
<div id="authModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Вы не авторизированы</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        Чтобы добавить вакансию авторизируйтесь!
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
        <a href="#myModal" data-toggle="modal"><button data-dismiss="modal" type="button" class="btn btn-success">Ок</button></a>
      </div>
    </div>
  </div>
</div>



		<div class="row main-wrap">
			<div class="col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1 adverts">

			<?php if (!$vacancyes):?>
				<h4 class="text-center vacancy-not-fount">Поиск не дал результатов...</h4>
			<?php endif;?>

			<?php foreach($vacancyes as $vacancy): ?>
			<!-- <a href="/vacancy/<?php //echo $vacancy['id']; ?>"> -->
				<div class="row" style="margin-top: 20px;">
						<div class="col-lg-12">
							<div class="advert-wrap">

								<div class="row h-inh flex-parent">
									<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
										<div class="">
											<div class="advert-wrap-img text-center">
												<img src="/uploads/<?php if ($vacancy['img']) echo $vacancy['img'].'.jpg'; else echo $vacancy['category'].'.jpg'?>" alt="photo">
											</div>
										</div>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 align-self-start margin-off">
										<div class="advert-inform-wrap">
											<h4 class="advert-title"><?php echo $vacancy['title']; ?></h4>
											<div class="advert-detail-wrap">
												<div class="advert-detail-1">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-category adi"></div>
														<h5><?php echo Categories::doShort(Categories::getNameByNum($vacancy['category'])); ?></h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-geo adi"></div>
														<h5><?php echo $vacancy['geo']; if($vacancy['geo'] != 'Не определено') echo ' р-н.';?></h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-cash adi"></div>
														<h5><?php echo $vacancy['salary'].' руб/'.Vacancy::getSParams($vacancy['salary_params']); ?></h5>
													</div>
												</div>
												<div class="advert-detail-2">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-date adi"></div>
														<h5><?php echo Vacancy::getDate($vacancy['date_start'], $vacancy['date_end'], $vacancy['dd']);?></h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-old adi"></div>
														<h5><?php echo $vacancy['old']; 
														if($vacancy['old'] == '14-16' || $vacancy['old'] == '16-18') echo ' лет'; else echo '+';?></h5>
													</div>
													<a href="/kazan/vacancy/<?php echo $vacancy['id']; ?>">
														<div class="advert-view">Смотреть</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
				</div>
						<!-- </a> -->
			<?php endforeach; ?>

			<!-- Pagination -->
			<div class="row" style="margin-top: 20px;">
					<div class="col-lg-12">
						<?php if ($total > 10) echo $pagination->get(); ?>
					</div>
			</div>

		</div>

			<div class="col-lg-3 col-lg-offset-0 col-md-3 col-md-offset-0 ads-right hidden-sm col-xs-10 col-xs-offset-1">
			<script>
					(function(d, s, h){
					var p = ~location.protocol.indexOf(h)?'':h+':';
					var m = d.getElementsByTagName(s)[0];
					var n = d.createElement('script');n.src=p+'//glopart.ru/ads/adunit/7128/script.js';
					m.parentNode.insertBefore(n,m);d.write('<div id="glopart-adunit-7128" data-glopart-adunit="7128"></div>');
					})(document, 'script', 'http');
			</script>
				<!-- <img class="main-ads" src="/template/ads/1.png" alt="">
				<img class="main-ads" src="/template/ads/2.png" alt="">
				<img class="main-ads" src="/template/ads/3.png" alt=""> -->
				<script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>
				<!-- VK Widget -->
				<div id="vk_groups" class="main-ads"></div>
				<script type="text/javascript">
				VK.Widgets.Group("vk_groups", {mode: 3, no_cover: 1, width: 'auto'}, 120322885);
				</script>
			</div>

			<div class="col-lg-1 col-md-1 col-xs-1"></div>
		</div>

	</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
<script src="/template/js/site/search.js"></script>
<script src="/template/library/date-picker/zebra_datepicker.js"></script>
</div>

</body>
</html>