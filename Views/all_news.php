<?php
use App\Utils\Path;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
</head>
<body>

    <?php
    require Path::getAbsolute('Views/components/header.php');
    ?>

    <main class="all-news">

        <?php
        require Path::getAbsolute('Views/components/last_news.php');
        ?>
        
        <?php
        require Path::getAbsolute('Views/components/news_list.php');
        ?>
        
    </main>
    
    <?php
    require Path::getAbsolute('Views/components/footer.php');
    ?>
    
</body>
</html>
