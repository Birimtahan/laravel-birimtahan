<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
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
            'section' => new SectionResource($this->whenLoaded('section')),
            'title' => $this->title,
            'description' => $this->description,
            'file' => $this->file,
            'sector' => $this->sector,
            'relative_order' => $this->relative_order,
        ];
    }
}
