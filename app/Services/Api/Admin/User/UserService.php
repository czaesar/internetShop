<?php

namespace App\Services\Api\Admin\User;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\EloquentRepository;
use App\Services\Api\AbstractService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserService extends AbstractService
{

    public function __construct()
    {
        parent::__construct(new EloquentRepository(new User()));
    }

    public function update(array $data, int $id): Model
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return parent::update($data, $id);
    }
}
