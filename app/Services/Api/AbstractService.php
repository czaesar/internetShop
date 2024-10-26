<?php

namespace App\Services\Api;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class AbstractService
{

    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(array $data): LengthAwarePaginator
    {
        return $this->repository->indexListPaginate($data);
    }

    public function store(array $data): Model
    {
        return $this->repository->store($data);
    }

    public function show(int $id): Model
    {
        return $this->repository->show($id);
    }

}
