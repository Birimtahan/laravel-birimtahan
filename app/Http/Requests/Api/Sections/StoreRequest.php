<?php

namespace App\Http\Requests\Api\Sections;

use App\Models\Exam;
use App\Models\Section;
use Illuminate\Validation\Rule;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Api\Sections
 */
class StoreRequest extends AbstractRequest
{
    /**
     * @var Exam
     */
    protected $exam;

    public function authorize(): bool
    {
        return $this->user()->can('create', [Section::class, $this->getExam()]);
    }

    public function rules(): array
    {
        return [
            'exam_id' => 'required|exists:exams,id',
            'type' => [
                'required',
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
        ];
    }

    public function getExam(): Exam
    {
        if ($this->exam === null) {
            $this->exam = Exam::find($this->exam_id);
        }

        return $this->exam ?? new Exam();
    }
}
