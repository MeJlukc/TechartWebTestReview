<?php
use App\Utils\Path;

ob_start();
?>

<section class="home-page__container">
    <h1 class="home-page__title">Новости</h1>
    <a href="/news/" class="button home-page__button">К новостям</a>
</section>

<?php
$content = ob_get_clean();

require Path::getAbsolute('views/layout.php');
?>
