<?php

namespace App\Http\Controllers\Api\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Color\CreateColorRequest;
use App\Http\Requests\Api\Admin\Color\UpdateColorRequest;
use App\Http\Resources\Api\Admin\Color\ColorResource;
use App\Services\AdminCheckService;
use App\Services\Api\Admin\Color\ColorService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorController extends Controller
{
    public function __construct(
        protected AdminCheckService $adminCheckService,
        protected ColorService $colorService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): ResourceCollection
    {
        $this->adminCheckService->checkRole($request);
        $color = $this->colorService->index();

        return ColorResource::collection($color);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateColorRequest $request): ColorResource
    {
        $this->adminCheckService->checkRole($request);
        $data = $request->validated();
        $color = $this->colorService->store($data);

        return new ColorResource($color);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id): ColorResource
    {
        $this->adminCheckService->checkRole($request);
        $color = $this->colorService->show($id);

        return new ColorResource($color);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, string $id): ColorResource
    {
        $this->adminCheckService->checkRole($request);
        $data = $request->validated();
        $color = $this->colorService->update($data, $id);

        return new ColorResource($color);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id): ColorResource
    {
        $this->adminCheckService->checkRole($request);
        $color = $this->colorService->destroy($id);

        return new ColorResource($color);
    }
}
