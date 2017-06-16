<?php header('Content-Type: text/html; charset= utf-8'); ?>
<?php Layouts::head('Кабинет', '', '');?>
<?php include ROOT . '/views/layouts/header-test.php'; ?>
<div class="cabinet-wrap">

<div class="container">
	<div class="row" style="margin-top: 10px;">
		<div class="col-lg-11 col-lg-offset-1">
			<?php
				if (isset($_SESSION['user'])) {
					echo "<div class='flex-parent'>";
					if (isset($_SESSION['user']['photo'])){
						echo "<div class='cabinet-avatar'><img src='".$_SESSION['user']['photo']."'></div>";
					}
					echo "<div class='help-block'>Приветствуем, ".$_SESSION['user']['name']."</div>";
					echo "</div>";
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="vacancies-wrap">
				<div class="cabinet-nav">
					<ul class="navbar-nav">
						<li class="<?php if ($type=='active') echo 'nav-active'; ?>">
							<a href="/cabinet">Активные вакансии</a>
						</li>
						<li class="<?php if ($type=='blocked') echo 'nav-active'; ?>">
							<a href="/cabinet/vacancies/blocked">Блокированные 
								<?php if($blocked_count):?><span class="badge"><?php echo $blocked_count;?></span><?php endif;?>
							</a>
						</li>
						<li class="<?php if ($type=='old') echo 'nav-active'; ?>">
							<a href="/cabinet/vacancies/old">Завершенные</a>
						</li>
					</ul>
					<ul class="navbar-nav">
						<li class="<?php if ($type=='profile') echo 'nav-active'; ?>"><a href="/cabinet/profile">Профиль</a></li>
					</ul>
					<a href="/cabinet/add" class="cabinet-add">Добавить Вакансию</a>
				</div>



		<div class="row" style="margin-top: 50px;">
			<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-10 col-sm-offset-1">




		<?php if ($notVacancy):?>
			<div class="text-center"><?php echo $notVacancy;?></div>
		<?php endif;?>




			<?php foreach ($vacancies as $key => $vacancy): ?>
					<div class="row cabinet-advert-wrap">
						<div class="col-lg-12">
							<div class="advert-wrap">
								<div class="row h-inh flex-parent">
									<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
										<div class="">
											<div class="cabinet-vacancy-img text-center" data-img="<?php echo $vacancy['img'].'.jpg';?>">
												<img src="/uploads/<?php if ($vacancy['img']) echo $vacancy['img'].'.jpg'; else echo $vacancy['category'].'.jpg'?>" alt="photo">
											</div>
										</div>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 align-self-start margin-off cabinet-vacancy-col">
										<?php if (isset($vacancy['blocked_alert'])):?>
											<div class="advert-remeber-date" data-toggle="tooltip" title="<?php echo $vacancy['blocked_alert'];?>">
												<i class="fa fa-ban"></i>
											</div>
										<?php endif;?>
										<div class="cabinet-advert-inform-wrap">
												<?php if ($type == 'active' && $vacancy['status'] == 1):?>
													<a href="<?php echo '/vacancy/'.$vacancy['id'];?>">
														<h4 class="advert-title"><?php echo $vacancy['title'];?></h4>
													</a>
												<?php else:?>
													<h4 class="advert-title"><?php echo $vacancy['title'];?></h4>
												<?php endif;?>
											<?php if ($type == 'active'):?>
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
														<h5><?php echo $vacancy['geo']; if($vacancy['geo'] != 'Не определено') echo ' р-н.';?></h5>
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
													<div class="pull-right">
														<?php if(isset($vacancy['status'])): ?>
															<?php if($vacancy['status'] == 0): ?>
																<div class="cabinet-moder"><i class="fa fa-cog"></i>На модерации</div>
															<?php endif; ?>
														<?php endif; ?>
														<?php if($type == 'active'): ?>
															<a href="/cabinet/stop/<?php echo $vacancy['id'];?>">
																<div class="cabinet-stop">Завершить</div>
															</a>
														<?php else: ?>
															<a href="" class="delete-vacancy" id="<?php echo $vacancy['id'];?>">
																<div class="cabinet-delete <?php if($type=='old') echo 'cabinet-delete-old';?>">
																<i class="fa fa-trash-o"></i>Удалить</div>
															</a>
														<?php endif; ?>
														<?php if($type == 'active' || $type == 'blocked'): ?>
															<a href="/cabinet/edit/<?php echo $vacancy['id'];?>">
																<div class="cabinet-edit">Редактировать</div>
															</a>
														<?php endif; ?>
													</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
				</div>
		<?php endforeach; ?>

			</div>
			<div class="col-lg-3 col-md-3 col-sm-1"></div>
		</div>




			</div>
		</div>
		<div class="col-lg-1"></div>
	</div><!-- //row-menu -->

</div>





<!-- Модальное окно - Модерация -->
<div id="moderationModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Модерация</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        После модерации вакансия<br> появится в поиске!
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">Ок</button>
      </div>
    </div>
  </div>
</div>


<div style="margin-top: 800px;"></div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
<script src="/template/js/site/cabinet.js"></script>
<script>
	// Показ модального окна после успешного добавления вакансии
$(document).ready(function(){
	<?php if($type == 'active' && isset($_SESSION['added-vacancy'])):?> $("#moderationModal").modal('show'); <?php endif;?>
	<?php unset($_SESSION['added-vacancy']); ?>
});
// Показ модального окна после успешного добавления вакансии - END
</script>
</div>

</body>
</html>