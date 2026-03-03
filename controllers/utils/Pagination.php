<?php
class Pagination
{
    public static function hasPreviousPage($currentPageNumber)
    {
        return $currentPageNumber > 1;
    }

    public static function hasNextPage($currentPageNumber, $totalPages)
    {
        return $currentPageNumber < $totalPages;
    }

    public static function getInfo($currentPageNumber, $totalPages)
    {
        if ($totalPages <= 3) {
            $beginPaginationPage = 1;
            $endPaginationPage = $totalPages;
        } else {
            if ($currentPageNumber === 1) {
                $beginPaginationPage = 1;
                $endPaginationPage = 3;
            } elseif (($currentPageNumber == $totalPages) || ($currentPageNumber + 1 == $totalPages)) {
                $beginPaginationPage = $totalPages - 2;
                $endPaginationPage = $totalPages;
            } else {
                $beginPaginationPage = $currentPageNumber;
                $endPaginationPage = $currentPageNumber + 2;
            }
        }

        $hasPreviousPage = self::hasPreviousPage($currentPageNumber);
        $hasNextPage = self::hasNextPage($currentPageNumber, $totalPages);

        return [$beginPaginationPage, $endPaginationPage, $hasPreviousPage, $hasNextPage];
    }
}
