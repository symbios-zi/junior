<?php Layouts::head('Админка', '', '');?>
<?php include ROOT . '/views/layouts/adminheader.php'; ?>
<link href="/template/css/admin.css" rel="stylesheet">

<div class="container">
	<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="vacancies-wrap">

					<div class="cabinet-nav" style="justify-content: space-around;">
					<ul class="navbar-nav">
						<li class="<?php if ($type=='moderation') echo 'nav-active'; ?>">
							<a href="/cabinet/admin">Модерируемые</a>
						</li>
						<li class="<?php if ($type=='active') echo 'nav-active'; ?>">
							<a href="/cabinet/admin/active">Активные</a>
						</li>
						<li class="<?php if ($type=='blocked') echo 'nav-active'; ?>">
							<a href="/cabinet/admin/blocked">Блокированные</a>
						</li>
						<li class="<?php if ($type=='old') echo 'nav-active'; ?>">
							<a href="/cabinet/admin/old">Завершенные</a>
						</li>
					</ul>
						<a href="/cabinet/add" class="cabinet-add">Добавить Вакансию</a>
						<a href="/cabinet/admin/stopped" class="cabinet-stopped"><i class="fa fa-stop-circle"></i> Завершить</a>
				</div>

					<div class="row" style="margin-top: 50px;">
						<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-10 col-sm-offset-1 vacancies">

			<?php if ($notVacancy):?>
				<div class="text-center"><?php echo $notVacancy;?></div>
			<?php endif;?>
			<div class="admin-new-counter flex-parent hidden">
				<div class="hidden admin-count-new"><?php echo $currentCount; ?></div>
				<div class="hidden admin-type"><?php echo $type; ?></div>
				<div class="admin-new-counter-plus">+</div>
				<div class="counter"></div>
			</div>
				<?php foreach ($vacancies as $key => $vacancy): ?>
			<div class="advert-wrap">
					<div class="row cabinet-advert-wrap">
						<div class="col-lg-12">
								<div class="row h-inh flex-parent">
									<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
										<div class="">
											<div class="cabinet-vacancy-img text-center" data-img="<?php echo $vacancy['img'].'.jpg';?>">
												<img src="/uploads/<?php if ($vacancy['img']) echo $vacancy['img'].'.jpg'; else echo $vacancy['category'].'.jpg'?>" alt="photo">
											</div>
										</div>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 align-self-start margin-off cabinet-vacancy-col">
										<div class="cabinet-advert-inform-wrap">
											<h4 class="advert-title"><?php echo $vacancy['title'];?></h4>
												<?php if ($type == 'blocked' && isset($vacancy['blocked_alert'])):?>
													<div class="advert-remeber-date" data-toggle="tooltip" title="<?php echo $vacancy['blocked_alert'];?>">
														<i class="fa fa-ban"></i>
													</div>
												<?php endif;?>
												<?php if ($type == 'active' || $type == 'moderation'):?>
													<?php $dayoff = $vacancy['ending_vacancy'] - date('Ymd');?>
														<?php if($dayoff > 0 && $dayoff <= 3):?>
															<div class="advert-remeber-date" data-toggle="tooltip"
															title="Данная вакансия будет завершена через
															<?php echo $dayoff; if($dayoff == 1) echo ' день'; else echo ' дня';?>">
																<i class="fa fa-bell-o"></i>
															</div>
														<?php endif;?>
													<?php endif;?>

												<?php if ($type == 'active' || $type == 'moderation' || $type == 'blocked'):?>
												<?php $dayoff = $vacancy['ending_vacancy'] - date('Ymd');?>
												<?php if($dayoff > 0 && $dayoff <= 3):?>
													<div class="advert-remeber-date" data-toggle="tooltip"
													title="Данная вакансия будет завершена через
													<?php echo $dayoff; if($dayoff == 1) echo ' день'; else echo ' дня';?>">
														<i class="fa fa-bell-o"></i>
													</div>
												<?php endif;?>
											<?php endif;?>

											<div class="advert-detail-wrap">
												<div class="advert-detail-1">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-category adi"></div>
														<h5><?php echo Categories::doShort(Categories::getNameByNum($vacancy['category']));?></h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-geo adi"></div>
														<h5><?php echo $vacancy['geo'];?> р-н.</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-cash adi"></div>
														<h5><?php echo $vacancy['salary'];?></h5>
													</div>
												</div>
												<div class="advert-detail-2">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-date adi"></div>
														<h5><?php echo $vacancy['date'];?></h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-old adi"></div>
														<h5><?php echo $vacancy['old'];?>+</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<?php if ($vacancy['description']): ?>
							<h5 class="full-advert-dop hidden-xs">Дполнительно:</h5>
								<div class="full-advert-desc">
									<?php echo nl2br($vacancy['description']);?>
								</div>
						<?php endif; ?>
					</div>
				</div>

					<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="full-advert-contacts flex-parent">
										<span>Контакты</span>
										<?php if ($vacancy['vk_id']): ?><div class="full-advert-icon icon-vk-blue"></div><?php endif; ?>
										<?php if ($vacancy['whatsapp']): ?><div class="full-advert-icon icon-whatsapp-blue"></div><?php endif; ?>
										<?php if ($vacancy['telegram']): ?><div class="full-advert-icon icon-telegram-blue"></div><?php endif; ?>
									</div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 col-xs-offset-2">
								<div class="full-advert-show pull-right">
									<div class="advert-tel"><i class="fa fa-phone"></i> <?php echo $vacancy['tel'];?></div>
										<?php if($vacancy['vk_id']):?>
											<div class="advert-tel"><i class="fa fa-vk"></i> <?php echo $vacancy['vk_id'];?></div>
										<?php endif;?>
								</div>
							</div>
					</div>

					<div class="row admin-buttons-w">
						<div class="col-lg-12">
							<div class="col-lg-12">
								<div class="pull-right">
									<?php if($type == 'moderation'): ?>
										<a href="#" class="delete-vacancy blocked-go" data-id="<?php echo $vacancy['id'];?>">
											<div class="cabinet-delete"><i class="fa fa-trash-o"></i>Отклонить</div>
										</a>
										<a href="#">
											<div class="cabinet-edit">Смотреть все</div>
										</a>
										<a href="/cabinet/admin/do/success/<?php echo $vacancy['id'];?>">
											<div class="cabinet-edit cabinet-success">Принять</div>
										</a>
									<?php elseif($type == 'active'): ?>
										<a href="/cabinet/admin/do/delete/<?php echo $vacancy['id'];?>" class="delete-vacancy">
											<div class="cabinet-delete"><i class="fa fa-trash-o"></i>Удалить</div>
										</a>
										<a href="#" class="blocked-go" data-id="<?php echo $vacancy['id'];?>">
											<div class="cabinet-edit">Блокировать</div>
										</a>
									<?php elseif($type == 'blocked'): ?>
										<a href="/cabinet/admin/do/success/<?php echo $vacancy['id'];?>">
											<div class="cabinet-edit cabinet-success">Принять</div>
										</a>
										<a href="/cabinet/admin/do/blocked/<?php echo $vacancy['id'];?>" class="delete-vacancy">
											<div class="cabinet-delete"><i class="fa fa-trash-o"></i>Удалить</div>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
			</div>  <!-- //advert-wrap(border) -->
		<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div style="margin-top: 800px;"></div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
<script src="/template/js/site/admin.js"></script>
</div>

<!-- Модальное окно - ПоБлокирование -->
<div id="blockedModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Отклонить вакансию</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        <ul class="blocked-item">
        	<a href="#" id="blocked-link-1"><li>1. <i class="fa fa-refresh"></i> Повторная подача объявления</li></a>
        	<a href="#" id="blocked-link-2"><li>2. <i class="fa fa-phone"></i> Указан неверный номер</li></a>
        	<a href="#" id="blocked-link-3"><li>3. <i class="fa fa-vk"></i> Ссылка на страницу ВК указана не верно</li></a>
        	<a href="#" id="blocked-link-4"><li>4. <i class="fa fa-money"></i> Сомнительно большая зарплата</li></a>
        	<a href="#" id="blocked-link-5"><li>5. <i class="fa fa-bell"></i> Вакансия похожа на лохотрон</li></a>
        	<a href="#" id="blocked-link-6"><li>6. <i class="fa fa-bug"></i> Вакансия противоречит правилам размещения вакансий на нашем сайте</li></a>
        </ul>
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>