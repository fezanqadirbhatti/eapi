<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'category'  => $this->category->name,
            'detail'    => $this->detail,
            'price'     => $this->price,
            'stock'     => $this->stock,
            'discount'  => $this->discount. '%',
            'discounted_price' => round($this->price - (($this->price / 100) * $this->discount), 2),
            'links'     => [
                'reviews' => route('reviews.index', $this->id),
                'product_category' => route('product-category', $this->category->id)
            ]
        ];
    }
}
