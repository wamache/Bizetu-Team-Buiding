<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->resource['slug'],
            'layout' => $this->resource['layout'],
            'columns_count' => $this->resource['columns_count'],
            'items' => MenuResource::collection($this->resource['items']),
        ];
    }
}
