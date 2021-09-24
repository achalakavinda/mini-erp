<?php

namespace App\Services;
use App\Http\Resources\ItemCodeResource;
use App\Services\Contracts\ItemCodeServiceInterface;
use Illuminate\Http\Request;

class ItemCodeService implements ItemCodeServiceInterface
{

    public function get(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $perPage = $request->per_page?: 10;
        $searchText = $request->search_text?  : null;
        $sortOrder = $request->sort_order? : 'ASC';

        $itemCodesQueryBuilder =  \App\Models\Views\Ims\ItemCodeView::query();

        if($searchText)
        {
            $itemCodesQueryBuilder->where('item_name','like','%'.$searchText.'%');
        }

        foreach (explode( ',', $request->sort_field?:'item_id' ) as $item) {
            $itemCodesQueryBuilder->orderBy($item,$sortOrder);
        }

        $itemCodes = $itemCodesQueryBuilder->paginate($perPage);

        return ItemCodeResource::collection($itemCodes);
    }
}
