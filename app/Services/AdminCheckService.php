<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

class AdminCheckService
{
    public function checkRole($request): void
    {
        $user = $request->user();

        if (!$user->hasAnyRole(['super-admin', 'admin'])) {
            throw new \Exception('Access denied', Response::HTTP_FORBIDDEN);
        }
    }
}
