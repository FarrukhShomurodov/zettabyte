<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'parent_category_id' => $this->parent_category_id,
            'title' => $this->title,
            'quantity'=> $this->quantity,
            'images' => $this->images,
            'price' => $this->price,
            'description' => $this->description,
            'sold_quantity' => $this->sold_quantity,
            'youtube_link' => $this->youtube_link,
            'video' => $this->video,
        ];
    }
}
