<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

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

    public function indexList(): Collection
    {
        return $this->model->newQuery()->get();
    }

    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    public function show(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function update($data, $id): Model
    {
        return tap($this->model->findOrFail($id))->update($data);
    }

    public function destroy(int $id): Model
    {
        return tap($this->model->findOrFail($id), fn ($model) => $model->delete());
    }
}
