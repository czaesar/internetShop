<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    public function indexListPaginate(array $data): LengthAwarePaginator;

    public function store(array $data): Model;

    public function show(int $id): Model;
}
