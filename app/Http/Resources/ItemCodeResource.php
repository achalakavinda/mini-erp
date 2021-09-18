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
            'id'=>$this->id,
            'brand_id'=>$this->brand_id,
            'brand'=>Brand::find($this->brand_id),
            'item_code_batch_id'=>$this->item_code_batch_id,
            'color_id'=>$this->color_id,
            'size_id'=>$this->size_id,
            'company_id'=>$this->company_id,
            'company_division_id'=>$this->company_division_id,
            'type_measurement_id'=>$this->type_measurement_id,
            'type'=>$this->type,
            'name'=>$this->name,
            'description'=>$this->description,
            'thumbnail_url'=>$this->thumbnail_url,
            'unit_cost'=>$this->unit_cost,
            'selling_price'=>$this->selling_price,
            'nbt_tax_percentage'=>$this->nbt_tax_percentage,
            'vat_tax_percentage'=>$this->vat_tax_percentage,
            'market_price'=>$this->market_price,
            'min_price'=>$this->min_price,
            'max_price'=>$this->max_price,
            'active'=>$this->active,
        ];
    }
}
