<?php

namespace App\Controllers;

use App\Models\News;
use App\Utils\Pagination;
use App\Utils\Path;

class NewsController extends Controller
{
    public function allNewsPage()
    {
        $news = new News();

        $currentPageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limitNewsItems = 4;

        $totalNews = $news->getTotal();
        $totalPages = ceil($totalNews / $limitNewsItems);

        if (($currentPageNumber < 1) || $currentPageNumber > $totalPages) {
            return $this->notFoundPage();
        }

        $offset = ($currentPageNumber - 1) * $limitNewsItems;

        $newsList = $news->getList($limitNewsItems, $offset);

        $lastNewsItem = $news->getLastOne();

        $pagination = new Pagination($currentPageNumber, $totalPages);
        [$beginPaginationPage, $endPaginationPage, $hasPrevPage, $hasNextPage] = $pagination->getPagination();

        require Path::getAbsolute('Views/all_news.php');
    }

    public function selectedNewsPage($id)
    {
        $news = new News();

        $totalNews = $news->getTotal();

        if ($id < 1 || $id > $totalNews) {
            return $this->notFoundPage();
        } 

        $newsItem = $news->findById($id);

        require Path::getAbsolute('Views/selected_news.php');
    }
}
