<?php

namespace App\Controllers;

use App\Models\News;
use App\Utils\Pagination;

class NewsController
{
    protected $model;

    public function __construct()
    {
        $this->model = new News();
    }

    public function notFoundPage()
    {
        require ROOT . '/Views/404.php';
    }

    public function allNewsPage()
    {
        $currentPageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limitNewsItems = 4;

        $totalNews = $this->model->getTotal();
        $totalPages = ceil($totalNews / $limitNewsItems);

        if (($currentPageNumber < 1) || $currentPageNumber > $totalPages) {
            $this->notFoundPage();
            return;
        }

        $offset = ($currentPageNumber - 1) * $limitNewsItems;

        $newsList = $this->model->getList($limitNewsItems, $offset);

        $lastNewsItem = $this->model->getLastOne();

        $pagination = new Pagination($currentPageNumber, $totalPages);
        [$beginPaginationPage, $endPaginationPage, $hasPrevPage, $hasNextPage] = $pagination->getPagination();

        require ROOT . '/Views/all_news.php';
    }

    public function selectedNewsPage($id)
    {
        $totalNews = $this->model->getTotal();

        if ($id < 1 || $id > $totalNews) {
            $this->notFoundPage();
            return;
        } 

        $news = $this->model->findById($id);

        require ROOT . '/Views/selected_news.php';
    }
}
