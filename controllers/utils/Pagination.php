<?php
class Pagination
{
    protected $currentPageNumber;
    protected $totalPages;

    public function __construct($currentPageNumber, $totalPages)
    {
        $this->currentPageNumber = $currentPageNumber;
        $this->totalPages = $totalPages;
    }

    public function hasPreviousPage()
    {
        return $this->currentPageNumber > 1;
    }

    public function hasNextPage()
    {
        return $this->currentPageNumber < $this->totalPages;
    }

    public function getPagination()
    {
        if ($this->totalPages <= 3) {
            $beginPaginationPage = 1;
            $endPaginationPage = $this->totalPages;
        } else {
            if ($this->currentPageNumber === 1) {
                $beginPaginationPage = 1;
                $endPaginationPage = 3;
            } elseif (($this->currentPageNumber == $this->totalPages) || ($this->currentPageNumber + 1 == $this->totalPages)) {
                $beginPaginationPage = $this->totalPages - 2;
                $endPaginationPage = $this->totalPages;
            } else {
                $beginPaginationPage = $this->currentPageNumber;
                $endPaginationPage = $this->currentPageNumber + 2;
            }
        }

        $hasPreviousPage = $this->hasPreviousPage();
        $hasNextPage = $this->hasNextPage();

        return [$beginPaginationPage, $endPaginationPage, $hasPreviousPage, $hasNextPage];
    }
}
