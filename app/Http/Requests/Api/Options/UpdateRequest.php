<?php

namespace App\Http\Requests\Api\Options;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Api\Options
 */
class UpdateRequest extends AbstractRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->option);
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:4000',
            'file' => 'sometimes|nullable|file',
            'sector' => 'sometimes|nullable|string',
            'relative_order' => 'sometimes|nullable|integer',
        ];
    }
}
