<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'house_number' => $this->house_number,
            "building_block" => $this->building_block,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            'created_at' => $this->created_at?->format('d.m.Y H:i'),
        ];
    }
}
