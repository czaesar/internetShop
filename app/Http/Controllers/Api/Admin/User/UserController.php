<?php

namespace App\Http\Controllers\Api\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\User\CreateUserRequest;
use App\Http\Requests\Api\Admin\User\GetUserRequest;
use App\Http\Requests\Api\Admin\User\UpdateUserRequest;
use App\Http\Resources\Api\Admin\User\UserResource;
use App\Services\AdminCheckService;
use App\Services\Api\Admin\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected AdminCheckService $adminCheckService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(GetUserRequest $request): ResourceCollection
    {
        $data = $request->validated();
        $user = $this->userService->index($data);

        return UserResource::collection($user);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request): UserResource
    {
        $data = $request->validated();
        $user = $this->userService->store($data);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): UserResource
    {
        $user = $this->userService->show($id);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id): UserResource
    {
        $data = $request->validated();
        $user = $this->userService->update($data, $id);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): UserResource
    {
        $user = $this->userService->destroy($id);

        return new UserResource($user);
    }
}
