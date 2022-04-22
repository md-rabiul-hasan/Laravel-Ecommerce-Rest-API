<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name"    => $this->name,
            "price"   => number_format($this->price,2),
            "stock"   => $this->stock > 0 ? $this->stock : 'Out of Stock',
            "details" => [
                "href" => route('products.show', $this->id)
            ]
        ];
    }
}
