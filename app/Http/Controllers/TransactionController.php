<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * GENERATED CLASS - DO NOT EDIT!
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller {

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) {

        $limit = $request->get('limit') ?: 10;
        $offset = $request->get('offset') ?: 0;

        /**
         * @var Builder $query
         */
        $query = \DB::table('transactions')
            ->select([
                'transactions.id',
                \DB::raw('CONCAT_WS(\' \',transactors.first_name, transactors.last_name) AS transactor'),
                'transactions.amount',
                'transactions.transacted_at'
            ])
            ->limit($limit)
            ->offset($offset)
            ->join('transactors', 'transactions.transactor_id', '=', 'transactors.id')
            ->groupBy('transactions.id');

        $response = $this->getResponse($query, $limit, $offset);

        return (new JsonResponse())
            ->setData($response);

    }

}
