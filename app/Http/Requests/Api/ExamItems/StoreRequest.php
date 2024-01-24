<?php

namespace App\Http\Requests\Api\Exams;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Api\Exams
 */
class StoreRequest extends AbstractRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
