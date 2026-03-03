<?php
class Pagination
{
    private $page;
    private $pages;

    public function __construct($page, $pages)
    {
        $this->page = max(1, (int)$page);
        $this->pages = max(1, (int)$pages);
    }

    private function hasPreviousPage()
    {
        return $this->page > 1;
    }

    private function hasNextPage()
    {
        return ($this->page) < ($this->pages);
    }

    public function getPagination()
    {
        $page = $this->page;
        $pages = $this->pages;

        if ($pages <= 3) {
            $beginPage = 1;
            $endPage = $pages;
        } else {
            if ($page === 1) {
                $beginPage = 1;
                $endPage = 3;
            } elseif ($page === $pages || $page + 1 == $pages) {
                $beginPage = $pages - 2;
                $endPage = $pages;
            } else {
                $beginPage = $page;
                $endPage = $page + 2;
            }
        }

        $hasPreviousPage = $this->hasPreviousPage();
        $hasNextPage = $this->hasNextPage();

        return [$beginPage, $endPage, $hasPreviousPage, $hasNextPage];
    }
}