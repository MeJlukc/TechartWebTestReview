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
            $beginPage = 1;
            $endPage = $totalPages;
        } else {
            if ($currentPageNumber === 1) {
                $beginPage = 1;
                $endPage = 3;
            } elseif (($currentPageNumber == $totalPages) || ($currentPageNumber + 1 == $totalPages)) {
                $beginPage = $totalPages - 2;
                $endPage = $totalPages;
            } else {
                $beginPage = $currentPageNumber;
                $endPage = $currentPageNumber + 2;
            }
        }

        $hasPreviousPage = self::hasPreviousPage($currentPageNumber);
        $hasNextPage = self::hasNextPage($currentPageNumber, $totalPages);

        return [$beginPage, $endPage, $hasPreviousPage, $hasNextPage];
    }
}
