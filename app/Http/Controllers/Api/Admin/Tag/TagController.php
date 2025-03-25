<?php

namespace App\Http\Controllers\Api\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Tag\CreateTagRequest;
use App\Http\Requests\Api\Admin\Tag\UpdateTagRequest;
use App\Http\Resources\Api\Admin\Tag\TagResource;
use App\Services\AdminCheckService;
use App\Services\Api\Admin\Tag\TagService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagController extends Controller
{
    public function __construct(
        protected AdminCheckService $adminCheckService,
        protected TagService $tagService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        $tag = $this->tagService->index();

        return TagResource::collection($tag);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request): TagResource
    {
        $data = $request->validated();
        $tag = $this->tagService->store($data);

        return new TagResource($tag);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): TagResource
    {
        $tag = $this->tagService->show($id);

        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, string $id): TagResource
    {
        $data = $request->validated();
        $tag = $this->tagService->update($data, $id);

        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): TagResource
    {
        $tag = $this->tagService->destroy($id);

        return new TagResource($tag);
    }
}
