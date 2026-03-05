<?php
use App\Utils\Path;

ob_start();
?>

<section class="all-news">

    <?php
    require Path::getAbsolute('views/pages/components/last_news.php');
    ?>

    <section class="news">
    <h1 class="news__title">Новости</h1>

    <?php
    require Path::getAbsolute('views/pages/components/news_list.php');
    ?>

    <?php
    require Path::getAbsolute('views/pages/components/pagination.php');
    ?>
    </section>
    
</section>

<?php
$content = ob_get_clean();

require Path::getAbsolute('views/layout.php');
?>
