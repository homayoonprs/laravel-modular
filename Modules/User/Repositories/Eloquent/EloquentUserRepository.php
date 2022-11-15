<?php

namespace Modules\User\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\User\Entities\User;

class EloquentUserRepository extends EloquentBaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
