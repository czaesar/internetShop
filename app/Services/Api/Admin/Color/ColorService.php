<?php

namespace App\Services\Api\Admin\Color;

use App\Models\Color;
use App\Repositories\EloquentRepository;
use App\Services\Api\AbstractService;

class ColorService extends AbstractService
{
    public function __construct()
    {
        parent::__construct(new EloquentRepository(new Color()));
    }
}
