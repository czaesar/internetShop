<?php

namespace App\Http\Controllers\Api\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Color\CreateColorRequest;
use App\Http\Requests\Api\Admin\Color\UpdateColorRequest;
use App\Http\Resources\Api\Admin\Color\ColorResource;
use App\Services\Api\Admin\Color\ColorService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorController extends Controller
{
    public function __construct(
        protected ColorService $colorService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        $color = $this->colorService->indexList();

        return ColorResource::collection($color);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateColorRequest $request): ColorResource
    {
        $data = $request->validated();
        $color = $this->colorService->store($data);

        return new ColorResource($color);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): ColorResource
    {
        $color = $this->colorService->show($id);

        return new ColorResource($color);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, string $id): ColorResource
    {
        $data = $request->validated();
        $color = $this->colorService->update($data, $id);

        return new ColorResource($color);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): ColorResource
    {
        $color = $this->colorService->destroy($id);

        return new ColorResource($color);
    }
}
