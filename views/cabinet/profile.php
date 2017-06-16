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
			<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<div class="profile-wrap">
					<h4>Редактировать данные</h4><br>
					<div class="form">
						<div class="form-group" id="profile-name-wrap">
            	<span class="help-block modal-label">Имя:</span>
              	<input id="profile-name" type="text" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="login-email" class="form-control" placeholder="Имя" value="<?php echo $user['name'];?>">
            </div>
            <?php if($_SESSION['user']['account_type'] == 'emailEmailEmailEmail'):?>
	          	<div class="form-group" id="profile-email-wrap">
	            	<span class="help-block modal-label">Email адрес:</span>
	              	<input id="profile-email" type="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="login-email" class="form-control" placeholder="Ваша почта" value="glazunov.99@mail.ru">
	            </div>
          	<?php endif;?>
            <div class="form-group" id="profile-tel-wrap">
            	<span class="help-block modal-label">Номер:</span>
              	<input id="profile-tel" type="tel" id="profile-phone" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="login-email" class="form-control" placeholder="Номер телефона" value="<?php echo $user['tel'];?>">
            </div>
            <div class="form-group" id="profile-vk-wrap">
            	<span class="help-block modal-label">Профиль VK:</span>
              	<input id="profile-vk" type="text" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="login-email" class="form-control" placeholder="https://vk.com/..." value="<?php echo $user['vk'];?>">
            </div><br>
            <?php if($_SESSION['user']['account_type'] == 'email'):?>
            <div class="form-group" id="profile-oldpass-wrap">
            	<p class="help-block modal-label">Изменить Пароль</p>
               <p class="help-block profile-password-error"></p>
               <input id="profile-old-password" type="password" id="login-password" class="form-control" placeholder="Старый пароль">
            </div>
            <div class="form-group" id="profile-newpass-wrap">
               <input id="profile-new-password" type="password" id="login-password" class="form-control" placeholder="Новый пароль">
            </div>
            <?php endif;?>
            <div class="btn btn-success" id="profile-save">Сохранить</div>
        	</div>
				</div>
			</div>
			<div class="col-lg-7 col-md-6 col-sm-1 col-xs-1"></div>
		</div>




			</div>
		</div>
		<div class="col-lg-1"></div>
	</div><!-- //row-menu -->

</div>




<div style="margin-top: 800px;"></div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
<script src="/template/js/maskedinput.js"></script>
<script src="/template/js/site/profile.js"></script>
</div>

<!-- Модальное окно - Об успешном редактировании данных -->
<div id="profileUpdated" class="modal fade">
  <div class="modal-dialog modal-dialog-min">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Редактирование данных</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        Данные успешно сохранены!
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>