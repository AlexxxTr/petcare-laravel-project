<?php

namespace App\Modules\Auth\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Users\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthService extends Service {
    protected $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];

    private $registerRules;

    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->registerRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }

    public function login($requestData) {
        $this->validate($requestData);
        $this->result = Auth::attempt($requestData);
    }

    public function register($requestData) {
        Validator::validate($requestData, $this->registerRules);

        $this->result = $this->model->create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ]);
    }
}