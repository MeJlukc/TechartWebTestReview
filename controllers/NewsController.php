<?php
require ROOT . '/models/News.php';
require ROOT . '/controllers/utils/Pagination.php';

class NewsController
{
    private $model;

    public function __construct()
    {
        $this->model = new News();
    }

    public function notFound()
    {
        require ROOT . '/views/404.php';
    }

    public function main()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limit = 4;

        $total = $this->model->getCount();
        $pages = ceil($total / $limit);

        if ($page < 1) {
            $page = 1;
        } elseif ($page > $pages) {
            $this->notFound();
            return;
        }

        $offset = ($page - 1) * $limit;

        $news = $this->model->getList($limit, $offset);

        $lastNews = $this->model->getLastOne();
        
        $pagination = new Pagination($page, $pages);
        [$startPaginationPage, $endPaginationPage, $hasPrev, $hasNext] = $pagination->getPagination();

        require ROOT . '/views/main.php';
    }

    public function selectedNews($id)
    {
        $total = $this->model->getCount();

        if ($id < 1 || $id > $total) {
            $this->notFound();
            return;
        } 

        $news = $this->model->findNews($id);

        require ROOT . '/views/news.php';
    }
}
