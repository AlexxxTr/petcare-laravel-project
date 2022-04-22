<?php

namespace App\Http\Controllers;

use App\Modules\Users\Services\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    } 

    public function getUserById($id)
    {
        $user = $this->service->getUserById($id);

        if (is_null($user)) return response(['error' => 'user not found'], 404);

        return $user;
    }

    public function getLoggedInUser() {
        return auth()->user();
    }
}
