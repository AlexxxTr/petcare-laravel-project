<?php

namespace App\Http\Controllers;

use App\Modules\Houses\Services\HouseService;
use Illuminate\Http\Request;

class HouseApiController extends Controller
{
    private $service;

    public function __construct(HouseService $service)
    {
        $this->service = $service;
    }

    public function getHouseLoggedInUser(Request $request) {
        $userId = 3 /*$request->get('userId')*/;
        return $this->service->HouseOfUser($userId);
    }
}
