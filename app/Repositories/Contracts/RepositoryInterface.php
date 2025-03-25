<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function indexListPaginate(array $data): LengthAwarePaginator;

    public function indexList(): Collection;

    public function store(array $data): Model;

    public function show(int $id): Model;

    public function update(array $data, int $id): Model;

    public function destroy(int $id): Model;
}
