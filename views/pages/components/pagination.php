<ul class="pagination__list">
    <?php
    if ($pagination['hasPrevPage']):
    ?>
        <li class="pagination__item">
            <a href="/news/page-<?= $currentPageNumber - 1 ?>/" class="pagination__link pagination__link--before">
                <span class="pagination__arrow pagination__arrow--before"></span>
            </a>
        </li>
    <?php
    endif;
    ?>

    <?php
    for ($i = $pagination['beginPage']; $i <= $pagination['endPage']; $i++):
    ?>
        <li class="pagination__item">
            <a href="/news/page-<?=$i?>/" class="pagination__link <?= $i == $currentPageNumber ? 'pagination__link--active' : '' ?>"><?=$i?></a>
        </li>
    <?php
    endfor;
    ?>

    <?php
    if ($pagination['hasNextPage']):
    ?>
        <li class="pagination__item">
            <a href="/news/page-<?= $currentPageNumber + 1 ?>/" class="pagination__link pagination__link--next">
                <span class="pagination__arrow pagination__arrow--next"></span>
            </a>
        </li>
    <?php
    endif;
    ?>
</ul>
