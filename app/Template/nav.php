<nav class="main_navigation <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'opened no_animation' : '' ?>">
    <div class="app_info">
<!--        <div class="app_image">-->
<!--            <img src="/img/مولانا-المرشد.jpg" alt="app_image" width="100%" height="100%>-->
<!--        </div>-->
        <?php if (($library->LibraryImage !== null) && ($library->LibraryImage !== '')): ?>
            <div class="app_image">
                <img src="/uploads/images/<?= $library->LibraryImage ?>" width="100%" height="100%">
            </div>
        <?php else: ?>
            <?php if (($library->LibraryName !== null) && ($library->LibraryName !== '')): ?>
                <div class="name"><?= $library->LibraryName ?></div>
            <?php else: ?>
                <div class="name"><?= $text_library_name ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <ul class="app_navigation">
        <li class="<?= $this->matchUrl('/') === true ? 'selected' : '' ?>">
            <a href="/" onclick="closeResponsiveNav();"><i class="fa fa-home"></i>
                <?php if (($library->LibraryName !== null) && ($library->LibraryName !== '')): ?>
                    <?= $library->LibraryName ?>
                <?php else: ?>
                    <?= $text_library_name ?>
                <?php endif; ?>
            </a>
        </li>
        <li class="submenu">
            <a href="javascript:;"><i class="fa fa-book"></i> <?= $text_books ?></a>
            <ul>
                <li class="<?= $this->matchUrl('/books') === true ? 'selected' : '' ?>"><a href="/books" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_books_list ?></a></li>
                <li class="<?= $this->matchUrl('/categories') === true ? 'selected' : '' ?>"><a href="/categories" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_categories ?></a></li>
                <li class="<?= $this->matchUrl('/authors') === true ? 'selected' : '' ?>"><a href="/authors" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_authors_list ?></a></li>
                <li class="<?= $this->matchUrl('/lendBooks') === true ? 'selected' : '' ?>"><a href="/lendBooks" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_lend_books ?></a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="javascript:;"><i class="material-icons">group</i> <?= $text_members ?></a>
            <ul>
                <li class="<?= $this->matchUrl('/members') === true ? 'selected' : '' ?>"><a href="/members" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_members_list ?></a></li>
                <li class="<?= $this->matchUrl('/ranges') === true ? 'selected' : '' ?>"><a href="/ranges" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_ranges ?></a></li>
                <li class="<?= $this->matchUrl('/actions') === true ? 'selected' : '' ?>"><a href="/actions" onclick="closeResponsiveNav();"><i class="fa fa-list"></i><?= $text_actions ?></a></li>
            </ul>
        </li>
        <?php if (($this->session->u->RangeId == 1) || ($this->session->u->RangeId == 2) || ($this->session->u->RangeId == 3)): ?>
            <li><a href="/authentication/logout"><i class="fa fa-sign-out"></i> <?= $text_log_out ?></a></li>
        <?php endif; ?>
        <?php if (($this->session->u->RangeId == 4)): ?>
            <li><a href="/authentication/logout"><i class="fa fa-sign-in"></i> <?= $text_log_in ?></a></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="action_view <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'collapsed no_animation' : '' ?>">
    <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message): ?>
        <p class="message t<?= $message[1] ?>"><?= $message[0] ?></p>
    <?php endforeach;endif; ?>
