<?php
require ROOT . '/models/News.php';
require ROOT . '/controllers/utils/Pagination.php';

class NewsController
{
    public function notFound()
    {
        require ROOT . '/views/404.php';
    }

    public function allNews()
    {
        // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $currentPageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // $limit = 4;
        $limitNewsItems = 4;

        // $total = $this->model->getCount();
        // $pages = ceil($total / $limit);
        $totalNews = News::getCount();
        $totalPages = ceil($totalNews / $limitNewsItems);

        // if ($page < 1) {
        //     $page = 1;
        // } elseif ($page > $pages) {
        //     $this->notFound();
        //     return;
        // }
        if (($currentPageNumber < 1) || $currentPageNumber > $totalPages) {
            $this->notFound();
            return;
        }

        // $offset = ($page - 1) * $limit;
        $offset = ($currentPageNumber - 1) * $limitNewsItems;

        // $news = $this->model->getList($limit, $offset);
        $newsList = News::getList($limitNewsItems, $offset);

        $lastNews = News::getLastOne();
        
        // $pagination = new Pagination($currentPageNumber, $totalPages);
        // [$startPaginationPage, $endPaginationPage, $hasPrev, $hasNext] = $pagination->getPagination();
        [$beginPage, $endPage, $hasPrev, $hasNext] = Pagination::getInfo($currentPageNumber, $totalPages);

        require ROOT . '/views/main.php';
    }

    public function selectedNews($id)
    {
        $totalNews = News::getCount();

        if ($id < 1 || $id > $totalNews) {
            $this->notFound();
            return;
        } 

        $news = News::findById($id);

        require ROOT . '/views/news.php';
    }
}
