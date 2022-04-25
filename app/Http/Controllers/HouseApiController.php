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
        return $this->service->houseOfUser($userId);
    }

    public function getGuests(Request $request)
    {
        $userId = 3;
        return $this->service->getGuests($userId);
    }

    public function getPetsOfHouse($houseId) {
        return $this->service->getPetsOfHouse($houseId);
    }

    public function createHouse(Request $request)
    {
        return $this->service->createHouse($request->all());
    }

    public function addGuest(Request $request, $guestId)
    {
        $userId = 3 /*$request->get('userId')*/;
        $house = $this->service->houseOfuser($userId);
        return $this->service->addGuest(['house_id' => $house->id, 'user_id' => (int)$guestId]);
    }
}
