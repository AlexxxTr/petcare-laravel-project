<?php

namespace App\Modules\Users\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Users\Models\User;
use Illuminate\Validation\Rules\Password;

class UserService extends Service
{
    protected $rules = [
        "name" => ["string", "required"],
        "email" => ["string", "required", "email"],
        "password" => ["required"/*,  Password::min(8)->mixedCase()->numbers()*/]
    ];

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUserById($id)
    {
        return $this->model->find($id);
    }
}
