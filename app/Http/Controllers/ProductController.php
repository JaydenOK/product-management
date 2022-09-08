<?php
/**
 * Product Management
 */

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param Request $request
     * @param ProductService $productService
     * @return array
     */
    public function lists(Request $request, ProductService $productService)
    {
        try {
            $data = $productService->lists($request);
            return ['status' => 1, 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => 0, 'data' => [], 'message' => $e->getMessage()];
        }
    }

}
