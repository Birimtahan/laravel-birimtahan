<?php

namespace App\Http\Requests\Api\Exams;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AbstractRequest
 *
 * @package App\Http\Requests\Api\Exams
 */
abstract class AbstractRequest extends FormRequest
{
    abstract public function authorize(): bool;

    abstract public function rules(): array;
}
