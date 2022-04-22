<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name"        => $this->name,
            "description" => $this->details,
            "price"       => number_format($this->price,2),
            "stock"       => $this->stock,
            "discount"    => $this->discount." %"
        ];
    }
}