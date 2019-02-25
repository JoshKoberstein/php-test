<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {

    protected function getResponse(Builder $query, ?int $limit, int $offset): array {

        $results = $query->get()->toArray();

        if (null !== $limit) {
            $totalRecords = $this->getTotalRecords($query);
        } else {
            $totalRecords = \count($results);
        }

        $currentPage = 0;
        $totalPages = 0;

        if ($totalRecords) {
            $currentPage = $limit > 0
                ? (int)ceil(($offset + 1) / $limit)
                : 1;
            $totalPages = $limit > 0
                ? (int)ceil($totalRecords / $limit)
                : 1;
        }

        $peakMemory = \memory_get_peak_usage();

        return [
            'data'          => $results,
            'total_records' => $totalRecords,
            'current_page'  => $currentPage,
            'total_pages'   => $totalPages,
            'peak_memory'   => $peakMemory
        ];

    }

    protected function getTotalRecords(Builder $query): int {

        $totalRecords = $query->getCountForPagination();

        return $totalRecords;

    }

}
