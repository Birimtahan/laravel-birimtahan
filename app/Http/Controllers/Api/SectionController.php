<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use App\Http\Requests\Api\Sections\StoreRequest;
use App\Http\Requests\Api\Sections\UpdateRequest;
use App\Http\Resources\SectionResource;

class SectionController extends Controller
{
    public function store(StoreRequest $request)
    {
        $exam = $request->getExam();
        $section = $exam->sections()->create($request->validated());

        return new SectionResource($section);
    }

    public function update(UpdateRequest $request, Section $section)
    {
        $section->fill($request->validated());
        $section->save();

        return new SectionResource($section);
    }

    public function destroy(Section $section)
    {
        $this->authorize('delete', $section);
        $section->delete();

        return new SectionResource($section);
    }
}
