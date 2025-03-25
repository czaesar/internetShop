<?php

namespace App\Http\Controllers\Api\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Api\Admin\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\Admin\Category\CategoryResource;
use App\Services\AdminCheckService;
use App\Services\Api\Admin\Category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends Controller
{
    public function __construct(
        protected AdminCheckService $adminCheckService,
        protected CategoryService $categoryService
    ) {
    }

    public function index(): ResourceCollection
    {
        $category = $this->categoryService->indexList();

        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request): CategoryResource
    {
        $data = $request->validated();
        $category = $this->categoryService->store($data);

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id): CategoryResource
    {
        $category = $this->categoryService->show($id);

        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id): CategoryResource
    {
        $data = $request->validated();

        $category = $this->categoryService->update($data, $id);

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id): CategoryResource
    {
        $category = $this->categoryService->destroy($id);

        return new CategoryResource($category);
    }
}
