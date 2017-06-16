<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="main-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1     hidden-xs hidden-sm">
				<div class="selection flex-parent">
					<div class="category">
						<select form="search-form" name="category">
							<option align="center" value="">Категория</option>
							<option value="">Промоутер</option>
							<option value="">Разнорабочий</option>
							<option value="">Грузчик</option>
						</select>
					</div>

					<div class="search">
						<input type="search" name="search" form="search-form" placeholder="">
						<span class='search-icon-wrap'><img class="search-icon" src="/template/icons/search.png" alt=""></span>
					</div>

					<input class="search-button flex-parent" type="submit" form="search-form" value="Найти">

					
          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> -->
          <div class="params flex-parent" id="params">
          	<label>
							<span class="params-title">Параметры</span>
							<img class="params-img" src="/template/icons/setting.png" alt="параметры">
							<input type="checkbox" id="isParams">
						</label>
					</div>

				<div class="dropdown">
          <ul class="dropdown-menu">
          	<li>
          		Дата
          		<input type="text" name="date-from" class="add-datepicker-from">
          	</li>
            <!-- <li><a href="#">Действие</a></li>
            <li><a href="#">Другое действие</a></li>
            <li><a href="#">Что-то еще</a></li>
            <li class="divider"></li>
            <li><a href="#">Отдельная ссылка</a></li>
            <li class="divider"></li>
            <li><a href="#">Еще одна отдельная ссылка</a></li> -->
          </ul>
        </div>

					 <!-- <div class="params flex-parent">
						<li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> 
          <span data-toggle="dropdown">Параметры</span>
          <ul class="dropdown-menu">
            <li><a href="#">Действие</a></li>
            <li><a href="#">Другое действие</a></li>
            <li><a href="#">Что-то еще</a></li>
            <li class="divider"></li>
            <li><a href="#">Отдельная ссылка</a></li>
            <li class="divider"></li>
            <li><a href="#">Еще одна отдельная ссылка</a></li>
          </ul>
        </li>
        <img class="params-img" src="/dopjob/template/icons/setting.png" alt="параметры">
					</div>  -->



					<div class="add-advert flex-parent">
						<span>Добавить объявление</span>
						<img class="add-advert-img" src="/dopjob/template/icons/plus.png" alt="plus">
					</div>
				</div>
			</div>
			<div class="col-sm-1"></div>
		</div>

		<!-- <nav class="navbar navbar-default" role="navigation"> -->
  <div class="container-fluid hidden">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Действие</a></li>
            <li><a href="#">Другое действие</a></li>
            <li><a href="#">Что-то еще</a></li>
            <li class="divider"></li>
            <li><a href="#">Отдельная ссылка</a></li>
            <li class="divider"></li>
            <li><a href="#">Еще одна отдельная ссылка</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<!-- </nav> -->
		<div class="row">
			<div class="col-lg-3 col-lg-offset-6">
				<div class="params-menu hidden">
					<form action="/search/" method="GET" id="search-form">
						<div class="params-tr">
							<span class="params-tr-name">Дата:</span>
							<input type="text" name="date_from" class="add-datepicker-from params-inp params-date">
							<span>-</span>
							<input type="text" name="date_to"   class="add-datepicker-to   params-inp params-date">
						</div>
						<hr class="params-divider">
						<div class="params-tr">
							<span class="params-tr-name">Зарплата:</span>
							<input type="text" name="salary_from" class="params-salary form-control params-inp">
							<span>-</span>
							<input type="text" name="salary_to"   class="params-salary form-control params-inp">
							<select class="form-control params-s-params params-inp" name="salary-params">
								<option value="1">руб/час</option>
								<option value="2">руб/день</option>
								<option value="3">руб/месяц</option>
							</select>
						</div>
						<hr class="params-divider">
						<div class="params-tr">
							<span class="params-tr-name">Гео:</span>
							<select class="form-control params-geo params-inp" name="geo">
								<option value="0">Выберите район</option>
								<option value="Авиастроительный">Авиастроительный</option>
								<option value="Кировский">Кировский</option>
								<option value="Московский">Московский</option>
								<option value="Ново-Савиновский">Ново-Савиновский</option>
								<option value="Приволжский">Приволжский</option>
								<option value="Советский">Советский</option>
								<option value="all">Любой район</option>
							</select>
						</div>
						<hr class="params-divider">
						<div class="params-tr flex-parent pull-right">
							<select name="old" id="" class="form-control btn-default params-old">
								<option value="0">Возраст</option>
								<option value="14">от 14 лет</option>
								<option value="16">от 16 лет</option>
								<option value="18">от 18 лет</option>
							</select>
							<button type="submit" class="btn btn-success btn-lg params-go">Применить</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>

		<div class="row main-wrap">
			<div class="col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1 adverts">
				<div class="row">
						<div class="col-lg-12">
							<div class="advert-wrap">

								<div class="row h-inh flex-parent">
									<div class="col-lg-3">
										<div class="">
											<div class="advert-wrap-img text-center">
												<img src="/dopjob/template/images/main/promo.jpg" alt="photo">
											</div>
										</div>
									</div>
									<div class="col-lg-9 align-self-start margin-off">
										<div class="advert-inform-wrap">
											<!-- Максимум 47 символов! -->
											<!-- Дисковые щетки для мтз, кдм Бесплатная доставка -->
											<!-- Требуется активный и общительный промоутер и тд -->
											<h4 class="advert-title">Требуется активный и общительный промоутер и тд</h4>
											<div class="advert-detail-wrap">
												<div class="advert-detail-1">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-category adi"></div>
														<h5>Промоутер</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-geo adi"></div>
														<h5>Советский р-н.</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-cash adi"></div>
														<h5>120 руб/час</h5>
													</div>
												</div>
												<div class="advert-detail-2">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-date adi"></div>
														<h5>4.01.17 - 9.01.17</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-old adi"></div>
														<h5>14+</h5>
													</div>
													<a href="/promoyter/2?category=promoyter&old=14"><div class="advert-view">Смотреть</div></a>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
				</div>



				<div class="row" style="margin-top: 20px;">
						<div class="col-lg-12">
							<div class="advert-wrap">

								<div class="row h-inh flex-parent">
									<div class="col-lg-3">
										<div class="">
											<div class="advert-wrap-img text-center">
												<img src="/dopjob/template/images/main/promo.jpg" alt="photo">
											</div>
										</div>
									</div>
									<div class="col-lg-9 align-self-start margin-off">
										<div class="advert-inform-wrap">
											<!-- Максимум 47 символов! -->
											<!-- Дисковые щетки для мтз, кдм Бесплатная доставка -->
											<!-- Требуется активный и общительный промоутер и тд -->
											<h4 class="advert-title">Требуется активный и общительный промоутер и тд</h4>
											<div class="advert-detail-wrap">
												<div class="advert-detail-1">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-category adi"></div>
														<h5>Промоутер</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-geo adi"></div>
														<h5>Советский р-н.</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-cash adi"></div>
														<h5>120 руб/час</h5>
													</div>
												</div>
												<div class="advert-detail-2">
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-date adi"></div>
														<h5>4.01.17 - 9.01.17</h5>
													</div>
													<div class="advert-detail-tr flex-parent">
														<div class="advert-icon-old adi"></div>
														<h5>14+</h5>
													</div>
													<div class="advert-view">
														Смотреть
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
				</div>





			</div>

			<div class="col-lg-3 col-md-3 ads-right hidden-sm hidden-xs">
				<img src="/dopjob/template/ads/1.png" alt="">
				<img src="/dopjob/template/ads/2.png" alt="">
				<img src="/dopjob/template/ads/3.png" alt="">
			</div>

			<div class="col-lg-1 col-md-1"></div>
		</div>

	</div>
</div>







<?php include ROOT . '/views/layouts/footer.php'; ?>
