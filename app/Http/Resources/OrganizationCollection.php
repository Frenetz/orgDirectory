<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrganizationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => OrganizationResource::collection($this->collection),
            'meta' => [
                'count' => $this->count(),
            ]
        ];
    }
}