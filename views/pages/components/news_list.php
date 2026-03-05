<div class="news__list">
    <?php
    foreach ($newsList as $item):
    ?>
        <div class="news-card">
            <p class="news-card__date date"><?=$item['fmt']?></p>
            <h2 class="news-card__title"><?=$item['title']?></h2>
            <span class="news-card__text"><?=$item['announce']?></span>
            <a href="/news/<?=$item['id']?>/" class="button news-card__button">Подробнее</a>
        </div>
    <?php
    endforeach;
    ?>
</div>
