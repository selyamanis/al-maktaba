<div class="container-fluid">
    <div class="index">
        <?php if (($library->LibraryName !== null) && ($library->LibraryName !== '')): ?>
            <div class="library_name"><?= $library->LibraryName ?></div>
        <?php else: ?>
            <div class="library_name"><?= $text_library_name ?></div>
        <?php endif; ?>
        <div class="index_menu">
            <div class="index_submenu">
                <a href="/books" class="button"><?= $text_books_list ?><div class="index_info">(<?= $totalBooks ?>)</div></a>
                <a href="/categories" class="button"><?= $text_categories ?><div class="index_info">(<?= $totalCategories ?>)</div></a>
            </div>
            <div class="index_submenu">
                <a href="/members" class="button"><?= $text_members_list ?><div class="index_info">(<?= $totalMembers ?>)</div></a>
                <a href="/lendBooks" class="button"><?= $text_lend_books ?><div class="index_info">(<?= $totalLendBooks ?>)</div></a>
            </div>
        </div>
    </div>
</div>
