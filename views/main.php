<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/style.css">
</head>
<body>

    <?php
    require ROOT . '/views/components/header.php';
    ?>

    <main class="main-page">

        <?php
        require ROOT . '/views/components/last_news.php';
        ?>
        
        <?php
        require ROOT . '/views/components/news_list.php';
        ?>
        
    </main>
    
    <?php
    require ROOT . '/views/components/footer.php';
    ?>
    
</body>
</html>
