<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="stylesheet" href="<?=BASE_URL?>App/assets/styles/style.css">
</head>
<body>

    <?php
    require ROOT . '/App/Views/components/header.php';
    ?>

    <main class="all-news">

        <?php
        require ROOT . '/App/Views/components/last_news.php';
        ?>
        
        <?php
        require ROOT . '/App/Views/components/news_list.php';
        ?>
        
    </main>
    
    <?php
    require ROOT . '/App/Views/components/footer.php';
    ?>
    
</body>
</html>
