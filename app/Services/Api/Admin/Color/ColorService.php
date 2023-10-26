<?php

namespace App\Services\Api\Admin\Color;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ColorService
{
    public function index(): Collection
    {
        $tag = Color::query()->get();

        return $tag;
    }

    public function store(array $data): Model
    {
        $tag = Color::query()->create($data);

        return $tag;
    }

    public function show($id): Model
    {
        $tag = Color::query()->findOrFail($id);

        return $tag;
    }

    public function update($data, $id): Model
    {
        $tag = Color::query()->findOrFail($id);
        $tag->update($data);

        return $tag;
    }

    public function destroy($id): Model
    {
        $tag = Color::query()->findOrFail($id);
        $tag->delete();

        return $tag;
    }
}
