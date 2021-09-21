<?php

namespace App\Http\Resources;

use App\Models\Ims\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return  [
            'id'=>$this->item_id,
            'brand_id'=>$this->brand_id,
            'brand_name'=>$this->brand_name?:'Other',
            'item_code_batch_id'=>$this->item_code_batch_id,
            'color_id'=>$this->color_id,
            'color_name'=>$this->color_name?:'Other',
            'size_id'=>$this->size_id,
            'size_name'=>$this->size_name?:'Other',
            'category_id'=>$this->category_id,
            'category_name'=>$this->category_name?:'Other',
            'item_name'=>$this->item_name,
            'description'=>$this->item_description,
            'thumbnail_url'=>$this->thumbnail_url,
            'unit_cost'=>$this->unit_cost?:number_format(0,2),
            'selling_price'=>$this->selling_price?:number_format(0,2),
            'nbt_tax_percentage'=>$this->nbt_tax_percentage?:number_format(0,2),
            'vat_tax_percentage'=>$this->vat_tax_percentage?:number_format(0,2),
            'market_price'=>$this->market_price?:number_format(0,2),
            'min_price'=>$this->min_price?:number_format(0,2),
            'max_price'=>$this->max_price?:number_format(0,2),
            'unit_price_with_tax'=>$this->unit_price_with_tax?:number_format(0,2),
            'stock_qty'=>$this->stock_qty?:0,
            'active'=>$this->active,
        ];
    }
}
