<?php 
$category = Categories::getNameByNum($vacancy['category']);
$title = $vacancy['title'].' в Казани - dopjob.ru';
$description = 'Требуется '.$category.' в Казани. Зарплата - '.$vacancy['salary'].
' руб/'.Vacancy::getSParams($vacancy['salary_params']).', Возраст '.$vacancy['old'].'+'.' .'.$vacancy['description'].' .Искать работу проще с Dopjob.ru .На сайте множество вакансий в твоем городе, заходи!';
$keywords = 'Работа '.$category.' в Казани, Работа в Казани, '.$category.' в Казани, Работа в Казани с '.$vacancy['old'].' лет, dopjob, допджоп';

Layouts::head($title, $description, $keywords);
?>
<?php include ROOT . '/views/layouts/header-test.php'; ?>

<div class="view-wrapper">
<div class="container">
	<div class="row hidden-xs">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="ads-top"><img src="/template/ads/large.jpg" alt=""></div>
		</div>
		<div class="col-lg-1"></div>
	</div>

	<div class="row full-advert">
			<div class="row">
				<div class="col-lg-7 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-10 col-xs-10 col-xs-offset-1">

					<div class="row">
						<div class="col-lg-3 col-xs-12">
							<div class="bread-prev flex-parent">
								<a class="full-advert-back-link" href="javascript:history.back();">
									<span class="full-advert-back"><span class="full-advert-icon icon-back-green"></span>Назад</span>
								</a>
							</div>
						</div>
						<div class="col-lg-9 col-xs-0"></div>
					</div>

	<div class="full-advert-wrap">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="full-advert-title text-center"><?php echo $vacancy['title'];?></h4>
						</div>
					</div>
			<div class="row full-advert-inner">
				<div class="col-lg-12">
					<div class="row">


					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 view-img-wrap" style="height: inherit;">
							<div>
								<div class="advert-wrap-img text-center">
									<img src="/uploads/<?php if ($vacancy['img']) echo $vacancy['img'].'.jpg'; else echo $vacancy['category'].'.jpg'?>" alt="">
								</div>
							</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 view-detail-1-wrap" style="padding-left: 0; padding-right: 0;">
						<div class="advert-full-detail-row">
							<div class="view-detail-1-row">
								<div class="advert-full-detail-tr flex-parent">
									<div class="advert-icon-category adi"></div>
									<h5><?php echo Categories::doShort($category);?></h5>
								</div>
								<div class="advert-full-detail-tr flex-parent">
									<div class="advert-icon-geo adi"></div>
									<h5><?php echo $vacancy['geo']; if($vacancy['geo'] != 'Не определено') echo ' р-н.';?></h5>
								</div>
								<div class="advert-full-detail-tr flex-parent">
									<div class="advert-icon-cash adi"></div>
									<h5><?php echo $vacancy['salary'];?> руб/<?php echo Vacancy::getSParams($vacancy['salary_params']);?></h5>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-5 col-sm-4 col-xs-4 view-detail-1-wrap">
						<div class="advert-full-detail-row">
							<div class="view-detail-2-row">
								<div class="advert-full-detail-tr flex-parent">
									<div class="advert-icon-date adi"></div>
									<h5><?php echo Vacancy::getDate($vacancy['date_start'], $vacancy['date_end'], $vacancy['date_daily']);?>
									</h5>
								</div>
								<div class="advert-full-detail-tr flex-parent">
									<div class="advert-icon-old adi"></div>
									<h5><?php echo $vacancy['old'];?>+</h5>
								</div>
							</div>
						</div>
					</div>


					</div>
				</div>
			</div> <!-- full-advert-inner -->



				<div class="row">
					<div class="col-lg-12 hidden-xs"><hr class="full-advert-hr"></div>
				</div>

					<div class="row">
						<div class="col-lg-4">
							<hr class="full-advert-m-hr hidden-lg hidden-md hidden-sm">
							<?php if ($vacancy['description']): ?>
								<div><h5 class="full-advert-dop hidden-xs">Дполнительно:</h5></div>
							<?php endif; ?>
						</div>
						<div class="col-lg-8"></div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<?php if ($vacancy['description']): ?>
								<div class="full-advert-desc">
									<?php echo nl2br($vacancy['description']);?>
								</div>
							<?php endif; ?>
						</div>
					</div>

						<div class="row flex-parent">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
								<?php if ($vacancy['vk'] || $vacancy['whatsapp'] || $vacancy['telegram']): ?>
								<div class="full-advert-contacts flex-parent">
									<span>Контакты</span>
									<?php if ($vacancy['vk']): ?><div class="full-advert-icon icon-vk-blue"></div><?php endif; ?>
									<?php if ($vacancy['whatsapp']): ?><div class="full-advert-icon icon-whatsapp-blue"></div><?php endif; ?>
									<?php if ($vacancy['telegram']): ?><div class="full-advert-icon icon-telegram-blue"></div><?php endif; ?>
								</div>
							<?php endif; ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-5">
								<div class="full-advert-show">
									<div class="view-modal-num animated" data-effect="fadeInDown" style="display:none;"></div>
									<div class="hidden" id="vacancy-id"><?php echo $vacancy['id'];?></div>
									<span id="show-num">Показать <i class="fa fa-phone full-advert-icon-phone"></i></span>
								</div>
							</div>
						</div>
</div> <!-- //full-advert-wrap -->

				<div class="row hidden">
						<div class="col-lg-12">
								<div class="hidden" id="rel-id"><?php echo $vacancy['id'];?></div>
								<div class="hidden" id="rel-category"><?php echo $vacancy['category'];?></div>
								<div class="hidden" id="rel-df"><?php echo $vacancy['date_end'];?></div>
								<div class="hidden" id="rel-old"><?php echo $vacancy['old'];?></div>
						</div>
				</div>

<div class="row" style="margin-top: 80px;">
	<div class="col-lg-12 full-rel-wrapp hidden">
		<span class="relatives-head hidden-xs">Похожие вакансии</span>
<a href='#' id='prev-slide'><i class="fa fa-chevron-left"></i></a>
<!-- data-cycle-loader=wait -->
		<div class="cycle-slideshow" 
		    data-cycle-fx=carousel
		    data-cycle-timeout=0
		    data-cycle-carousel-visible=3
		    data-cycle-next="#next-slide"
		    data-cycle-prev="#prev-slide">
		</div>

    <a href='#' id='next-slide'><i class="fa fa-chevron-right"></i></a>

	</div>
</div>


				</div> <!-- //col-lg-7 -->
				<div class="col-sm-1 col-xs-1 hidden-lg hidden-md hidden-xs"></div>
				<!-- <div class="col-sm-1 hidden-lg hidden-md hidden-xs"></div> -->
				<div class="col-lg-3 col-lg-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-1 col-xs-10 col-xs-offset-1 ads-view-right">
					<img class="ads" src="/template/ads/view.gif" alt="">
					<img class="ads" src="/template/ads/view3.png" alt="">
				</div>
				<div class="col-sm-1 hidden-md col-lg-1"></div>
			</div>
	</div>

</div>


<?php include ROOT . '/views/layouts/footer.php';?>
<script src="/template/js/site/view.js"></script>
<script src="/template/js/cycle2.js"></script>
<script src="/template/js/cycle2.carousel.js"></script>
<script src="/template/js/cycle2.center.js"></script>
<script src="/template/js/site/relatives.js"></script>
</div>

</body>
</html>