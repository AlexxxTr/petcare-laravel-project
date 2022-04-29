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

    public function getHouseLoggedInUser(Request $request)
    {
        $userId = 3 /*$request->get('userId')*/;
        $this->service->houseOfUser($userId);
        if ($this->service->getResult() == null) return response('No house found for this user', 404);
        $this->service->getResult();
    }

    public function getGuests(Request $request)
    {
        $userId = 3;
        $this->service->getGuests($userId);
        return $this->service->getResult();
    }

    public function getPetsOfHouse($houseId) {
        $this->service->getPetsOfHouse($houseId);
        return $this->service->getResult();
    }

    public function createHouse(Request $request)
    {
        $this->service->createHouse($request->all());
        if ($this->service->hasErrors()) return response($this->service->getErrors(), 401);
        return $this->service->getResult();
    }

    public function addGuest(Request $request, $guestId)
    {
        $userId = 3 /*$request->get('userId')*/;
        $this->service->addGuest($userId, $guestId);
        return $this->service->getResult();
    }
}
