<?php

namespace App\Modules\Users\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Users\Models\User;

class UserService extends Service
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all() {
        return $this->model->get();
    }

    public function getUserById($id)
    {
        return $this->model->findOrFail($id);
    }
}
