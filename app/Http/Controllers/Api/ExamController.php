<?php

namespace App\Http\Controllers\Api;

use App\Models\Exam;
use App\Http\Requests\Api\Exams\UpdateRequest;
use App\Http\Resources\ExamResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::paginate(10);

        return ExamResource::collection($exams);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $exam = $user->exams()->create();

        return new ExamResource($exam);
    }

    public function show(Exam $exam)
    {
        return new ExamResource($exam);
    }

    public function update(UpdateRequest $request, Exam $exam)
    {
        $exam->fill($request->validated());
        $exam->slug = Str::slug($request->title, '-');;
        $exam->save();

        return new ExamResource($exam);
    }

    public function destroy(Exam $exam)
    {
        $this->authorize('delete', $exam);
        $exam->delete();

        return new ExamResource($exam);
    }
}
