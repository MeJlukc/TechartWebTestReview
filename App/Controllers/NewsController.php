<?php

namespace App\Controllers;

use App\Models\News;
use App\Utils\Pagination;

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
        $paginationInfo = $pagination->getPagination();

        $this->render('news.list', [
            'currentPageNumber' => $currentPageNumber,
            'lastNewsItem' => $lastNewsItem,
            'newsList' => $newsList,
            'pagination' => $paginationInfo,
        ]);
    }

    public function selectedNewsPage($id)
    {
        $news = new News();

        $totalNews = $news->getTotal();

        if ($id < 1 || $id > $totalNews) {
            return $this->notFoundPage();
        } 

        $newsItem = $news->findById($id);

        $this->render('news.detail', [
            'totalNews' => $totalNews, 
            'newsItem' => $newsItem,
        ]);
    }
}
