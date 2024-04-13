<?php

namespace App\Http\Resources;

use App\Models\Img;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'region_id' => $this->region_id,
            'price' => $this->price,
            'description' => $this->description,
            'location' => $this->location,
            'img' => $this->images,
        ];
    }
}
