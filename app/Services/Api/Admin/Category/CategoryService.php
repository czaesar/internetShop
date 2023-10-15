<?php

namespace App\Services\Api\Admin\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService
{
    public function index(): Collection
    {
        $category = Category::query()->get();

        return $category;
    }

    public function store(array $data): Model
    {
        $category = Category::query()->create($data);

        return $category;
    }

    public function show($id): Model
    {
        $category = Category::query()->findOrFail($id);

        return $category;
    }

    public function update($data, $id): Model
    {
        $category = Category::query()->findOrFail($id);
        $category->update($data);

        return $category;
    }

    public function destroy($id): Model
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();

        return $category;
    }
}
