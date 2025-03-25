<?php

namespace App\Services\Api;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AbstractService
{
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function indexListPaginate(array $data): LengthAwarePaginator
    {
        return $this->repository->indexListPaginate($data);
    }

    public function indexList(): Collection
    {
        return $this->repository->indexList();
    }

    public function store(array $data): Model
    {
        return $this->repository->store($data);
    }

    public function update(array $data, int $id): Model
    {
        return $this->repository->update($data, $id);
    }

    public function show(int $id): Model
    {
        return $this->repository->show($id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
