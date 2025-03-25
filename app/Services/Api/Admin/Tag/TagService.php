<?php

namespace App\Services\Api\Admin\Tag;

use App\Models\Tag;
use App\Repositories\EloquentRepository;
use App\Services\Api\AbstractService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TagService extends AbstractService
{
    public function __construct()
    {
        parent::__construct(new EloquentRepository(new Tag()));
    }
}
