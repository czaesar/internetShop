<?php

declare(strict_types=1);

namespace App\Services\Api\Admin\Tag;

use App\Models\Tag;
use App\Repositories\EloquentRepository;
use App\Services\Api\AbstractService;

class TagService extends AbstractService
{
    public function __construct()
    {
        parent::__construct(new EloquentRepository(new Tag()));
    }
}
