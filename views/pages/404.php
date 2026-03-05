<?php
use App\Utils\Path;

ob_start();
?>

<section class="not-found__container">
    <h1 class="not-found__title">Упс..</h1>
    <p class="not-found__text">Такой страницы не найдено:(</p>
    <a href="/" class="button not-found__button">На главную</a>
</section>

<?php
$content = ob_get_clean();

require Path::getAbsolute('views/layout.php');
?>
