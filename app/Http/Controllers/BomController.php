<?php
/**
 * Bom Management
 */

namespace App\Http\Controllers;

use App\Services\BomService;
use Illuminate\Http\Request;

class BomController extends Controller
{

    /**
     * bom list search
     * @param Request $request
     * @param BomService $bomService
     * @return array
     */
    public function lists(Request $request, BomService $bomService)
    {
        try {
            $data = $bomService->lists($request);
            return ['status' => 1, 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => 0, 'data' => [], 'message' => $e->getMessage()];
        }
    }

    /**
     * store bom
     * @param Request $request
     * @param BomService $bomService
     * @return array
     */
    public function add(Request $request, BomService $bomService)
    {
        try {
            $data = $bomService->add($request);
            return ['status' => 1, 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => 0, 'data' => [], 'message' => $e->getMessage()];
        }
    }

    /**
     * update a bom information
     * @param Request $request
     * @param BomService $bomService
     * @return array
     */
    public function update(Request $request, BomService $bomService)
    {
        try {
            $data = $bomService->update($request);
            return ['status' => 1, 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => 0, 'data' => [], 'message' => $e->getMessage()];
        }
    }

    /**
     * delete a bom
     * @param int $id
     * @param BomService $bomService
     * @return array
     */
    public function delete(int $id, BomService $bomService)
    {
        try {
            $data = $bomService->delete($id);
            return ['status' => 1, 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => 0, 'data' => [], 'message' => $e->getMessage()];
        }
    }

}
