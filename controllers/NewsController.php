<?php
require ROOT . '/models/News.php';
require ROOT . '/controllers/utils/Pagination.php';

class NewsController
{
    public static function notFoundPage()
    {
        require ROOT . '/views/404.php';
    }

    public static function allNewsPage()
    {
        $currentPageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limitNewsItems = 4;

        $totalNews = News::getTotal();
        $totalPages = ceil($totalNews / $limitNewsItems);

        if (($currentPageNumber < 1) || $currentPageNumber > $totalPages) {
            self::notFoundPage();
            return;
        }

        $offset = ($currentPageNumber - 1) * $limitNewsItems;

        $newsList = News::getList($limitNewsItems, $offset);

        $lastNewsItem = News::getLastOne();

        [$beginPaginationPage, $endPaginationPage, $hasPrevPage, $hasNextPage] = Pagination::getInfo($currentPageNumber, $totalPages);

        require ROOT . '/views/all_news.php';
    }

    public static function selectedNewsPage($id)
    {
        $totalNews = News::getTotal();

        if ($id < 1 || $id > $totalNews) {
            self::notFoundPage();
            return;
        } 

        $news = News::findById($id);

        require ROOT . '/views/selected_news.php';
    }
}
