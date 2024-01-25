<?php

namespace App\Http\Controllers\Api;

use App\Models\Option;
use App\Http\Requests\Api\Options\StoreRequest;
use App\Http\Requests\Api\Options\UpdateRequest;
use App\Http\Resources\OptionResource;

class OptionController extends Controller
{
    public function store(StoreRequest $request)
    {
        $section = $request->getSection();
        $option = $section->options()->create($request->validated());

        return new OptionResource($option);
    }

    public function update(UpdateRequest $request, Option $option)
    {
        $option->fill($request->validated());
        $option->save();

        return new OptionResource($option);
    }

    public function destroy(Option $option)
    {
        $this->authorize('delete', $option);
        $option->delete();

        return new OptionResource($option);
    }
}
