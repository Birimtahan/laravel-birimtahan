<?php

namespace App\Http\Requests\Api\Exams;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Api\Exams
 */
class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->exam);
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:4000',
        ];
    }
}
