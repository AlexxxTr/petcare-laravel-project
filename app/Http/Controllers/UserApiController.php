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
        return $this->service->getUserById($id);
    }

    public function getLoggedInUser()
    {
        return auth()->user();
    }
}
