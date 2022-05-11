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
        return auth()->user()->house;
    }

    public function getGuests()
    {
        $this->service->getGuests(auth()->user());
        return $this->service->getResult();
    }

    public function getPetsOfHouse($houseId)
    {
        $this->service->getPetsOfHouse($houseId);
        return $this->service->getResult();
    }

    public function getAllHousesRelatedToUser()
    {
        $this->service->getAllHousesRelatedToUser(auth()->user());
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
        $user = auth()->user();
        if ($user->id == (int)$guestId) return response(['message' => 'You can\'t add yourself as a guest'], 401);
        $this->service->addGuest($user, $guestId);
        return $this->service->getResult();
    }
}
