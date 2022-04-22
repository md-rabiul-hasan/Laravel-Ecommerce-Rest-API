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
            "name"          => $this->name,
            "description"   => $this->details,
            "price"         => number_format($this->price,2),
            "stock"         => $this->stock > 0 ? $this->stock : 'Out of Stock',
            "discount"      => $this->discount." %",
            "current_price" => ($this->price - (($this->price / 100) * $this->discount)),
            "rating"        => ($this->reviews->sum('star') / $this->reviews->count()),
            "reviews"       => [
                "href" => route('reviews.index', $this->id)
            ]
        ];
    }
}
