<?php

namespace App\Controllers;

use App\Models\News;
use App\Utils\Pagination;
use App\Utils\Path;

class NewsController extends Controller
{
    public function allNewsPage($currentPageNumber = 1)
    {
        $news = new News();

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

        require Path::getAbsolute('views/pages/all_news.php');
    }

    public function selectedNewsPage($id)
    {
        $news = new News();

        $totalNews = $news->getTotal();

        if ($id < 1 || $id > $totalNews) {
            return $this->notFoundPage();
        } 

        $newsItem = $news->findById($id);

        require Path::getAbsolute('views/pages/selected_news.php');
    }
}
