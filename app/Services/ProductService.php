<?php

namespace App\Services;

use App\Exceptions\InvalidParamsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws InvalidParamsException
     */
    public function lists(Request $request)
    {
        $pageSize = (int)$request->get('pageSize', 20);
        $bomId = $request->get('bomId');
        $priceStart = $request->get('priceStart');
        $priceEnd = $request->get('priceEnd');
        $query = DB::table('product');
        if ($pageSize < 1) {
            throw new InvalidParamsException();
        }
        if (!empty($bomId)) {
            $query->where('bom_id', $bomId);
        }
        if (!empty($priceStart)) {
            $query->where('price', '>', $priceStart);
        }
        if (!empty($priceEnd)) {
            $query->where('price', '<', $priceEnd);
        }
        $result = $query->orderBy('bom_id', 'desc')->paginate($pageSize);
        return $result;
    }

}
