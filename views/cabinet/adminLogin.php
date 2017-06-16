<?php Layouts::head('Вход в Админку', '', '');?>
<?php include ROOT . '/views/layouts/adminheader.php'; ?>

<div class="container">
	<div class="row" style="margin-top: 50px;">
		<div class="col-lg-4 col-lg-offset-4">
			<form method="POST" id="adminform" class="form">
				<div class="form-group">
					<span class="help-block modal-label">Email адрес:</span>
					<input type="email" name="login" form="adminform" autofocus="autofocus" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="login-email" class="form-control" placeholder="Ваша почта">
				</div>
				<div class="form-group">
					<p class="help-block modal-label">Пароль:</p>
					<input type="password" name="password" form="adminform" id="login-password" class="form-control" placeholder="Введите пароль">
				</div>
				<div class="pull-right">
					<button type="submit" name="submit" form="adminform" class="btn btn-success btn-md">Войти</button>
				</div>
			</form>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>




<div style="margin-top: 800px;"></div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
</div>