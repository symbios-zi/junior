<body>
<!-- Mobile menu -->
<div off-canvas="id-1 left reveal" class="m_menu_wrapp">
    <div class="m_menu_header">
        <i class="fa fa-chevron-circle-left" id="m_menu_close"></i>
    </div>
    <div class="m_menu_content">
        <ul class="m_menu_list">
            <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="/cabinet/admin">Админка</a></li>
                <li><a href="/">Главная</a></li>
                <li><a id="m_menu_add" href='/cabinet/add'>Добавить вакансию</a></li>
            <?php endif; ?>
        </ul>
          <div class="m_menu_buttons">
            <?php if(isset($_SESSION['admin'])): ?>
                <a href="/cabinet/admin/logout" class="m_menu_logout">Выйти</a>
            <?php else:?>
              <div class="m_menu_login"><a href="/cabinet/admin/login">Войти</a></div>
            <?php endif;?>
          </div>
    </div>
</div>

    <div canvas="container">
    <header>
        <div class="head">
            <div class="container container-center">
                <div class="row row-center flex-parent">
                    <div class="col-sm-5 col-sm-offset-1 col-xs-5 col-xs-offset-1 flex-parent">
                        <a href="/"><img class="logo-img" src="/template/icons/logo.png" alt="dopjob logo"></a>
                        <a href="/"><h2 class="logo">opjob</h2></a>
                    </div>

                    <div class="col-sm-offset-3 col-sm-2 col-xs-offset-3 col-xs-2 text-center">
                        <div id="vk_auth"></div>
                        <span class='header-ref hidden-xs'>
                            <?php if(isset($_SESSION['admin'])): ?>
                                <a class="ref" href="/cabinet/admin"> Админка</a>
                                <a class="ref" href="/cabinet/admin/logout"><i class="fa fa-sign-out"></i> Выйти</a>
                            <?php else: ?>
                                <a class="ref" href="/cabinet/admin/login"><i class="fa fa-sign-in"></i> Войти</a>
                            <?php endif; ?>
                        </span>
                            <span class='header-ref hidden-lg hidden-md hidden-sm'>
                                <i class="fa fa-bars menu-bars" id="m_menu"></i>
                            </span>
                    </div>
                    <div class="col-sm-1 col-xs-1"></div>
                </div>
            </div>
        </div>
    </header>