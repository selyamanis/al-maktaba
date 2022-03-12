<div class="action_view login">
    <div class="login_header">
<!--        <div class="login_app_name"> $text_app_name </div>-->
        <div class="login_header_app">
            <form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded">

                <input required hidden type="text" name="ucname" id="ucname" value="visitor">
                <input required hidden type="password" id="ucpwd" name="ucpwd" value="visitor">

                <input class="app_name" type="submit" name="login" value="<?= $text_app_name ?>">
            </form>
        </div>
        <div class="login_language">
            <a href="javascript:;" class="language_switch language dropdown-toggle">
                <span><i class="fa fa-globe"></i></span>
                <?= $_SESSION['lang'] == 'ar' ? 'العربية' : '' ?>
                <?= $_SESSION['lang'] == 'de' ? 'Deutsch' : '' ?>
                <?= $_SESSION['lang'] == 'en' ? 'English' : '' ?>
<!--                <i class="material-icons">keyboard_arrow_down</i>-->
            </a>
            <ul class="language_menu">
                <li><a href="/language?lang=ar">العربية</a></li>
                <li><a href="/language?lang=de">Deutsch</a></li>
                <li><a href="/language?lang=en">English</a></li>
            </ul>
        </div>
    </div>
    <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message): ?>
        <p class="message t<?= $message[1] ?>"><?= $message[0] ?><a href="" class="closeBtn"><i class="fa fa-times"></i></a></p>
    <?php endforeach;endif; ?>
    <div class="login_visitor">
        <form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded">
                <!-- <div class="border"></div> -->

                <input required hidden type="text" name="ucname" id="ucname" value="visitor">
                <input required hidden type="password" id="ucpwd" name="ucpwd" value="visitor">

                <input type="submit" name="login" value="<?= $login_visitor ?>">
        </form>
    </div>
    <div class="login_box animate">
        <form autocomplete="off" method="post" enctype="application/x-www-form-urlencoded">
            <div class="border"></div>
            <h1><?= $login_header ?></h1>
            <img src="/img/user.png" width="120">
            <div class="input_wrapper username">
                <input required type="text" name="ucname" id="ucname" placeholder="<?= $login_ucname ?>">
            </div>
            <div class="input_wrapper password">
                <input required type="password" id="ucpwd" name="ucpwd" placeholder="<?= $login_ucpwd ?>">
            </div>
            <input type="submit" name="login" value="<?= $login_button ?>">
        </form>
    </div>
</div>