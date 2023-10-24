<?php

namespace App\Services\Api\Admin\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function index($data): LengthAwarePaginator
    {
        $user = User::query()->paginate($data['perPage']);

        return $user;
    }

    public function store(array $data): Model
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::query()->create($data);

        return $user;
    }

    public function show($id): Model
    {
        $user = User::query()->findOrFail($id);

        return $user;
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
