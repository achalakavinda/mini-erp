<?php

namespace App\Services;
use App\Http\Resources\SupplierResource;
use App\Models\Ims\Supplier;
use App\Services\Contracts\SupplierServiceInterface;
use Illuminate\Http\Request;

class SupplierService implements SupplierServiceInterface
{
    public function get(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $perPage = $request->per_page?: 10;
        $searchText = $request->search_text?  : null;
        $sortOrder = $request->sort_order? : 'ASC';

        $itemCodesQueryBuilder =  Supplier::query();

        if($searchText)
        {
            $itemCodesQueryBuilder->where('name','like','%'.$searchText.'%');
        }

        foreach (explode( ',', $request->sort_field?:'id' ) as $item) {
            $itemCodesQueryBuilder->orderBy($item,$sortOrder);
        }

        $itemCodes = $itemCodesQueryBuilder->paginate($perPage);

        return SupplierResource::collection($itemCodes);
    }
}
