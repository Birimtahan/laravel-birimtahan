<?php

namespace App\Http\Requests\Api\Sections;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Api\Sections
 */
class UpdateRequest extends AbstractRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->section);
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:4000',
            'type' => 'sometimes|nullable|string|max:255',
            'file' => 'sometimes|nullable|file',
            'correct_options' => 'sometimes|nullable|array',
            'relative_order' => 'sometimes|nullable|integer',
        ];
    }
}
