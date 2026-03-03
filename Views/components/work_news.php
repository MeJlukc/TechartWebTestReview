<main class="work-news">
    <p class="work-news__path">
        <a class="work-news__path__link" href="<?=BASE_URL?>">Главная</a> / <span class="text-color--grey"><?=$news['title']?></span>
    </p>
    <h1 class="work-news__title"><?=$news['title']?></h1>
    <div class="work-news__container">
        <div class="work-news__info">
            <p class="date"><?=$news['fmt']?></p>
            <h2 class="work-news__announce"><?=$news['announce']?></h2>
            <span class="work-news__content"><?=$news['content']?></span>
            <a class="button work-news__button" href="<?=BASE_URL?>">Назад к новостям</a>
        </div>
        <div class="work-news__media">
            <img src="<?=BASE_URL?>assets/images/<?=$news['image']?>" alt="Selected news image" class="work-news__image">
        </div>
    </div>
</main>
