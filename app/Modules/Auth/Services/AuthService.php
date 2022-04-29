<?php

namespace App\Modules\Auth\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Users\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthService extends Service {
    protected $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function login($requestData) {
        $this->validate($requestData);
        $this->result = Auth::attempt($requestData);
    }

    public function register($requestData, $rules) {
        Validator::validate($requestData, $rules);

        $this->result = $this->model->create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ]);
    }
}