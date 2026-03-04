<?php

namespace App\Controllers;

use App\Models\News;
use App\Utils\Pagination;
use App\Utils\Path;

class NewsController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new News();
    }

    public function allNewsPage()
    {
        $currentPageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limitNewsItems = 4;

        $totalNews = $this->model->getTotal();
        $totalPages = ceil($totalNews / $limitNewsItems);

        if (($currentPageNumber < 1) || $currentPageNumber > $totalPages) {
            notFoundPage();
            return;
        }

        $offset = ($currentPageNumber - 1) * $limitNewsItems;

        $newsList = $this->model->getList($limitNewsItems, $offset);

        $lastNewsItem = $this->model->getLastOne();

        $pagination = new Pagination($currentPageNumber, $totalPages);
        [$beginPaginationPage, $endPaginationPage, $hasPrevPage, $hasNextPage] = $pagination->getPagination();

        require Path::getAbsolute('Views/all_news.php');
    }

    public function selectedNewsPage($id)
    {
        $totalNews = $this->model->getTotal();

        if ($id < 1 || $id > $totalNews) {
            notFoundPage();
            return;
        } 

        $news = $this->model->findById($id);

        require Path::getAbsolute('Views/selected_news.php');
    }
}
