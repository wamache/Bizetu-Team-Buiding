<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->resolvedUrl(),
            'target_blank' => $this->target_blank,
            'css_class' => $this->css_class,
            'column_index' => $this->column_index,
            'subtitle' => $this->subtitle,
            'icon' => $this->image('icon', 'default'),
            'image' => $this->image('image', 'default'),
            'cta' => $this->cta_label ? [
                'label' => $this->cta_label,
                'style' => $this->cta_style,
            ] : null,
            'children' => MenuResource::collection($this->whenLoaded('children')),
        ];
    }
}
