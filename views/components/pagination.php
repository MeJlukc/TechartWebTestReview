<ul class="pagination__list">
    <?php
    if ($hasPrev):
    ?>
        <li class="pagination__item">
            <a href="<?=BASE_URL?>?page=<?= $page - 1 ?>" class="pagination__link pagination__link--before">
                <span class="pagination__arrow pagination__arrow--before"></span>
            </a>
        </li>
    <?php
    endif;
    ?>

    <?php
    for ($i = $startPaginationPage; $i <= $endPaginationPage; $i++):
    ?>
        <li class="pagination__item">
            <a href="<?=BASE_URL?>?page=<?=$i?>" class="pagination__link <?= $i == $page ? 'pagination__link--active' : '' ?>"><?=$i?></a>
        </li>
    <?php
    endfor;
    ?>

    <?php
    if ($hasNext):
    ?>
        <li class="pagination__item">
            <a href="<?=BASE_URL?>?page=<?= $page + 1 ?>" class="pagination__link pagination__link--next">
                <span class="pagination__arrow pagination__arrow--next"></span>
            </a>
        </li>
    <?php
    endif;
    ?>
</ul>
