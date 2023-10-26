<?php

namespace App\Services\Api\Admin\Tag;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TagService
{
    public function index(): Collection
    {
        $tag = Tag::query()->get();

        return $tag;
    }

    public function store(array $data): Model
    {
        $tag = Tag::query()->create($data);

        return $tag;
    }

    public function show($id): Model
    {
        $tag = Tag::query()->findOrFail($id);

        return $tag;
    }

    public function update($data, $id): Model
    {
        $tag = Tag::query()->findOrFail($id);
        $tag->update($data);

        return $tag;
    }

    public function destroy($id): Model
    {
        $tag = Tag::query()->findOrFail($id);
        $tag->delete();

        return $tag;
    }
}
