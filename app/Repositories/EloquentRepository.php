<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentRepository implements RepositoryInterface
{
    public function __construct(
        protected Model $model,
    ){}

    public function indexListPaginate(array $data): LengthAwarePaginator
    {
        $perPage = $data['perPage'] ?? 10;
        $page = $data['page'] ?? 1;

        return $this->model->newQuery()->paginate($perPage, ['*'], 'page', $page);
    }

    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    public function show(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

}
