<?php

namespace App\Services\Api\Admin\User;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\EloquentRepository;
use App\Services\Api\AbstractService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService extends AbstractService
{

    public function __construct(RepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
    public function index($data): LengthAwarePaginator
    {
        return $this->repository->indexListPaginate($data);
    }

    public function store(array $data): Model
    {
        return parent::store($data);
    }

    public function show($id): Model
    {
        return parent::show($id);
    }

    public function update($data, $id): Model
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::query()->findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function destroy($id): Model
    {
        $user = User::query()->findOrFail($id);
        $user->delete();

        return $user;
    }
}
