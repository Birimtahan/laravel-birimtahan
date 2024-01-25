<?php

namespace App\Http\Requests\Api\Options;

use App\Models\Option;
use App\Models\Section;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Api\Options
 */
class StoreRequest extends AbstractRequest
{
    /**
     * @var Section
     */
    protected $section;

    public function authorize(): bool
    {
        if (!$this->getSection()->exists) {
            return false;
        }

        return $this->user()->can('create', [Option::class, $this->getSection()]);
    }

    public function rules(): array
    {
        return [
            'section_id' => 'required|exists:sections,id',
        ];
    }

    public function getSection(): Section
    {
        if ($this->section === null) {
            $this->section = Section::find($this->section_id);
        }

        return $this->section ?? new Section();
    }
}
