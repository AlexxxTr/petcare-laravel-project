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

    public function getHouseLoggedInUser()
    {
        $userId = auth()->user()->id;
        $this->service->houseOfUser($userId);
        if ($this->service->getResult() == null) return response('No house found for this user', 404);
        return $this->service->getResult();
    }

    public function getGuests()
    {
        $userId = auth()->user()->id;
        $this->service->getGuests($userId);
        return $this->service->getResult();
    }

    public function getPetsOfHouse($houseId) {
        $this->service->getPetsOfHouse($houseId);
        return $this->service->getResult();
    }

    public function createHouse(Request $request)
    {
        $data = $request->all();
        $data['owner'] = auth()->user()->id;
        $this->service->createHouse($data);
        if ($this->service->hasErrors()) return response($this->service->getErrors(), 401);
        return $this->service->getResult();
    }

    public function addGuest($guestId)
    {
        $userId = auth()->user()->id;
        $this->service->addGuest($userId, $guestId);
        return $this->service->getResult();
    }
}
