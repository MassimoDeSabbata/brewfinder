<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BreweryListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "breweries" => BreweryResource::collection($this->breweries),
            "total" => $this->total,
            "page" => $this->page,
            "per_page" => $this->per_page,
            "totalPages" => $this->totalPages
        ];
    }
}
