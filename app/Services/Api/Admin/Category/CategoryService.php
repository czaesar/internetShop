<?php

namespace App\Services\Api\Admin\Category;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        $category = Category::query()->get();

        return $category;
    }
}
