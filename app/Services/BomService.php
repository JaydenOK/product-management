<?php

namespace App\Services;

use App\Exceptions\InvalidParamsException;
use App\Models\Bom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BomService
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws Exception
     */
    public function lists(Request $request)
    {
        $pageSize = (int)$request->get('pageSize', 20);
        $bomId = $request->get('bomId');
        $priceStart = $request->get('priceStart');
        $priceEnd = $request->get('priceEnd');
        $query = DB::table('bom');
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

    /**
     * add a new bom
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|min:5',
            'sku' => 'required',
            'price' => 'required',
            'costs' => 'required',
            'quantity' => 'required'
        ]);
        $data = $request->all();
        $bom = new Bom();
        $bom->name = $data['name'] ?? '';
        $bom->description = $data['description'] ?? '';
        $bom->price = $data['price'] ?? 0;
        $bom->costs = $data['costs'] ?? 0;
        $bom->quantity = $data['quantity'] ?? 0;
        $bom->category_id = $data['category_id'] ?? 0;
        if ($res = $bom->save()) {
            return $bom->bom_id;
        } else {
            return 0;
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'bom_id' => 'required|integer',
        ], [
            'required' => ':is required',
        ]);
        $data = $request->only((new Bom())->getFillable());
        $affect = DB::table('bom')->where('bom_id', $request->get('bom_id'))->update($data);
        return $affect;
    }

    public function delete($bomId)
    {
        $bom = Bom::find($bomId);
        if (empty($bom)) {
            throw new Exception('record not exist.');
        }
        //or update status
//        $bomId->status = Bom::STATUS_DELETED;
//        $affectRow =  $bom->save();
        $this->addOperateLog($bom, 'delete');
        $affectRow = $bom->delete();
        return $affectRow;
    }

    private function addOperateLog($bom, string $string)
    {

    }
}
