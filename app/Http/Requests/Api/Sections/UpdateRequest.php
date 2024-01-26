<?php

namespace App\Http\Requests\Api\Sections;

use App\Models\Section;
use Illuminate\Validation\Rule;

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
            'title' => 'sometimes|nullable|string|max:4000',
            'description' => 'sometimes|nullable|string|max:4000',
            'type' => [
                'sometimes',
                'string',
                Rule::in([
                    Section::TYPE_HEADER,
                    Section::TYPE_PART,
                    Section::TYPE_SHORT_ANSWER,
                    Section::TYPE_MULTIPLE_CHOICE,
                    Section::TYPE_CHECKBOX,
                    Section::TYPE_CHECKBOX_GRID,
                ])
            ],
            'file' => 'sometimes|nullable|file',
            'correct_options' => 'sometimes|nullable|array',
            'relative_order' => 'sometimes|nullable|integer',
        ];
    }
}
