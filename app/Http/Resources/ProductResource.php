<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Vinkla\Hashids\Facades\Hashids;

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
            'name' => $this->name,
            'slug' => $this->slug,
            'details' => $this->details,
            'description' => $this->description,
            'main_image' => $this->main_image,
            'alt_images' => $this->alt_images,
            'product_code' => $this->product_code,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];    
    }
}
