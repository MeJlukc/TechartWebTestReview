<main class="work-news">
    <p class="work-news__path">
        <a class="work-news__path__link" href="/news/">Главная</a> / <span class="text-color--grey"><?=$newsItem['title']?></span>
    </p>
    <h1 class="work-news__title"><?=$newsItem['title']?></h1>
    <div class="work-news__container">
        <div class="work-news__info">
            <p class="date"><?=$newsItem['fmt']?></p>
            <h2 class="work-news__announce"><?=$newsItem['announce']?></h2>
            <span class="work-news__content"><?=$newsItem['content']?></span>
            <a class="button work-news__button" href="/news/">Назад к новостям</a>
        </div>
        <div class="work-news__media">
            <img src="/assets/images/<?=$newsItem['image']?>" alt="Selected news image" class="work-news__image">
        </div>
    </div>
</main>
