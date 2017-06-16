<body>
<!-- Mobile menu -->
<div off-canvas="id-1 left reveal" class="m_menu_wrapp">
    <div class="m_menu_header">
        <i class="fa fa-chevron-circle-left" id="m_menu_close"></i>
    </div>
    <div class="m_menu_content">
        <ul class="m_menu_list">
            <?php if(isset($_SESSION['user'])): ?>
                <li><a href="/cabinet">Кабинет</a></li>
            <?php endif; ?>
            <li><a href="/">Главная</a></li>
            <li><a id="m_menu_add" href="<?php if(isset($_SESSION['user'])) echo '/cabinet/add'; else echo '#authModal'; ?>" data-toggle="modal">Добавить вакансию</a></li>
        </ul>
          <div class="m_menu_buttons">
            <?php if(isset($_SESSION['user'])): ?>
                <a href="/logout" class="m_menu_logout">Выйти</a>
            <?php else:?>
              <div class="m_menu_login">Войти</div>
              <div class="m_menu_reg">Регистрация</div>
            <?php endif;?>
          </div>
    </div>
</div>
<!-- //Mobile menu -->

<!-- Модальное окно - Подтверждение удаления -->
<div id="deleteModal" class="modal fade">
  <div class="modal-dialog modal-dialog-min">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Удалить</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        Удалить эту вакансию?
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
        <a href="" id="link-delete"><button type="button" class="btn btn-danger">Удалить</button></a>
      </div>
    </div>
  </div>
</div>
<!-- //Модальное окно - Подтверждение удаления -->


    <div canvas="container">
    <header>
        <div class="head">
            <div class="container container-center">
                <div class="row row-center flex-parent">
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 col-sm-offset-0 col-xs-6 col-xs-offset-0 flex-parent">
                        <a href="/kazan"><img class="logo-img" src="/template/icons/logo.png" alt="dopjob logo"></a>
                        <a href="/kazan"><h2 class="logo">opjob</h2></a>
                    </div>
<!-- col-sm-offset-3 -->
                    <div class="col-md-5 col-sm-6 col-xs-6 text-center">
                      <div class="pull-right">
                        <div id="vk_auth"></div>
                        <span class='header-ref hidden-xs'>
                            <?php if(isset($_SESSION['user'])): ?>
                                <a class="ref" href="/cabinet"> Кабинет</a>
                                <a class="ref" href="/logout"><i class="fa fa-sign-out"></i> Выйти</a>
                            <?php else: ?>
                                <a class="ref" href="#myModal" data-toggle="modal"><i class="fa fa-sign-in"></i> Войти</a>
                            <?php endif; ?>
                        </span>
                        <span class='header-ref hidden-lg hidden-md hidden-sm pull-right'>
                          <i class="fa fa-bars menu-bars" id="m_menu"></i>
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- HTML-код модального окна - Авторизация -->
<div id="myModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-login modal-sm modal-dialog-min">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">ВХОД</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class='alert alert-danger hidden' id="modal-login-error"></div>
                        <div class="form">
                            <div class="form-group">
                                <span class="help-block modal-label">Email адрес:</span>
                                <input type="email" autofocus="autofocus" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="login-email" class="form-control" placeholder="Ваша почта">
                            </div>
                            <div class="form-group">
                                <p class="help-block modal-label">Пароль:</p>
                                <input type="password" id="login-password" class="form-control" placeholder="Введите пароль">
                                <a href="#registerModal" data-toggle="modal" data-dismiss="modal" class="btn btn-link pull-right">Регистрация</a>
                                <br>
                            </div>
                        </div>

                            <button type="button" class="btn btn-success" id="login">Войти</button>
                            <a href="/login/vkauth" class="btn btn-primary" id="btn-vk-auth">Войти через <i class="fa fa-vk"></i></a>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
      </div>
      <!-- Футер модального окна -->
    </div>
  </div>
</div>



<!-- HTML-код модального окна - Регистрация -->
<div id="registerModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-login modal-sm modal-dialog-min">
    <div class="modal-content">
      <!-- Заголовок модального окна -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">РЕГИСТРАЦИЯ</h4>
      </div>
      <!-- Основное содержимое модального окна -->
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class='alert alert-danger hidden' id="modal-reg-error"></div>
                        <form class="form" id="reg-form">
                            <div class="form-group modal-form-group">
                                <span class="help-block modal-label">Имя:</span>
                                <input type="text" form="reg-form" autofocus="autofocus" id="reg-name" class="form-control" placeholder="Ваше Имя">
                            </div>
                            <div class="form-group modal-form-group">
                                <span class="help-block modal-label">Email адрес:</span>
                                <input type="email" form="reg-form" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" id="reg-email" class="form-control" placeholder="Ваша почта">
                            </div>
                            <div class="form-group modal-form-group">
                                <p class="help-block modal-label">Пароль:</p>
                                <input type="password" form="reg-form" id="reg-password" class="form-control" placeholder="Не менее 5 символов">
                            </div>
                        </form>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
      </div>
      <!-- Футер модального окна -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-success pull-right" id="register">Регистрация</button>
      </div>
    </div>
  </div>
</div>