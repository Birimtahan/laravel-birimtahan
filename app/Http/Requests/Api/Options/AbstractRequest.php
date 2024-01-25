<?php

namespace App\Http\Requests\Api\Options;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AbstractRequest
 *
 * @package App\Http\Requests\Api\Options
 */
abstract class AbstractRequest extends FormRequest
{
    abstract public function authorize(): bool;

    abstract public function rules(): array;
}
