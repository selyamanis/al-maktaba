<header class="main">
    <div class="app_info">
        <a href="javascript:;" data-menu-status="<?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'true' : 'false' ?>" class="menu_switch <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'opened no_animation' : '' ?>"><i class="fa fa-bars"></i></a>
        <h1 class="home">
            <a href="/" class="app_name">
                <i class="fa fa-home"></i>
            </a>
        </h1>
        <h1 class="app_name">
            <a href="/" class="app_name">
                <?= $text_app_name ?>
            </a>
        </h1>
        <h1 class="title">
        <?php if (($title == 'Al·Maktaba | الـمـكـتـبـة') && ($library->LibraryName !== null) && ($library->LibraryName !== '')): ?>
                <?= $library->LibraryName ?>
            <?php else: ?>
                <?= $title ?>
            <?php endif; ?>
        </h1>
    </div>
<!--    <div class="app_name">-->
<!--        <h1><a href="/" class="button"> $text_app_name </a></h1>-->
<!--    </div>-->
    <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2) || ($this->session->u->RangeId == 3)): ?>
    <a href="javascript:;" class="language_switch user">
        <?php if (($this->session->u->profile->Image !== null) && ($this->session->u->profile->Image !== '')): ?>
            <img src="/uploads/images/<?= $this->session->u->profile->Image ?>" width="40" height="40">
        <?php else: ?>
            <img src="/img/user.png" alt="app_user" width="40" height="40">
        <?php endif; ?>
    </a>
    <div class="user_menu_container">
        <a href="javascript:;" class="language_switch user dropdown-toggle">
            <span><?= $this->session->u->profile->FirstName ?></span>
<!--            <span> ( $this->session->u->LoginName ) </span>-->
<!--                <br />-->
<!--                <span class="privilege">[ $this->session->u->RangeName ]</span>-->
<!--                <i class="material-icons">keyboard_arrow_down</i>-->
        </a>
        <ul class="user_menu">
            <li><a href="/members/profile/<?= $this->session->u->MemberId ?>"><i class="fa fa-user"></i><?= $text_profile ?></a></li>
            <li><a href="/members/settings/<?= $this->session->u->MemberId ?>"><i class="fa fa-gear"></i><?= $text_settings ?></a></li>
            <li><a href="/authentication/logout"><i class="fa fa-sign-out"></i><?= $text_log_out ?></a></li>
        </ul>
    </div>
    <?php endif; ?>
    <?php if (($this->session->u->RangeId == 4)): ?>
        <div class="user_menu_container">
            <a href="/authentication/logout" class="language_switch"><span><i class="fa fa-sign-in"></i></span> <?= $text_log_in ?></a>
        </div>
    <?php endif; ?>
    <a href="javascript:;" class="language_switch language dropdown-toggle">
        <span><i class="fa fa-globe"></i></span>
        <?= $_SESSION['lang'] == 'ar' ? 'العربية' : '' ?>
        <?= $_SESSION['lang'] == 'de' ? 'Deutsch' : '' ?>
        <?= $_SESSION['lang'] == 'en' ? 'English' : '' ?>
<!--        <br />-->
<!--        <i class="material-icons">keyboard_arrow_down</i>-->
    </a>
    <ul class="language_menu">
        <li><a href="/language?lang=ar">العربية</a></li>
        <li><a href="/language?lang=de">Deutsch</a></li>
        <li><a href="/language?lang=en">English</a></li>
    </ul>
</header>