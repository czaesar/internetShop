<?php

namespace App\Services\Api\Admin\Category;

use App\Models\Category;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\EloquentRepository;
use App\Services\Api\AbstractService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends AbstractService
{
    public function __construct()
    {
        parent::__construct(new EloquentRepository(new Category()));
    }
}
