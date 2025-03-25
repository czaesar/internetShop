<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Tag\CreateTagRequest;
use App\Http\Requests\Api\Admin\Tag\UpdateTagRequest;
use App\Http\Resources\Api\Admin\Tag\TagResource;
use App\Services\Api\Admin\Tag\TagService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagController extends Controller
{
    public function __construct(
        protected TagService $tagService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        $tag = $this->tagService->indexList();

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
    public function show(int $id): TagResource
    {
        $tag = $this->tagService->show($id);

        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, int $id): TagResource
    {
        $data = $request->validated();
        $tag = $this->tagService->update($data, $id);

        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): TagResource
    {
        $tag = $this->tagService->destroy($id);

        return new TagResource($tag);
    }
}
