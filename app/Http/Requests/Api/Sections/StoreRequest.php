<?php

namespace App\Http\Requests\Api\Sections;

use App\Models\Exam;
use App\Models\Section;

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
            'type' => 'required',
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
