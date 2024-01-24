<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            'exam' => new ExamResource($this->whenLoaded('exam')),
            'title' => $this->title,
            'description' => $this->description,
            'file' => $this->file,
            'type' => $this->type,
            'correct_options' => $this->correct_options,
            'relative_order' => $this->relative_order,
        ];
    }
}
