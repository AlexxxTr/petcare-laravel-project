<?php

namespace App\Modules\Houses\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Houses\Models\House;
use App\Modules\Houses\Models\HouseGuest;

class HouseService extends Service
{
    protected $rules = [
        "name" => ["string", "required"]
    ];

    public function __construct(House $model)
    {
        parent::__construct($model);
    }

    public function houseOfUser($id)
    {
        $this->result = $this->model->with('owner')->where(['owner' => $id])->first();
        return $this->result;
    }

    public function getGuests($owner)
    {
        $this->result = $owner->house->guest;
    }

    public function getPetsOfHouse($houseId)
    {
        $this->result = $this->model->find($houseId)->pets;
    }

    public function getAllHousesRelatedToUser($user)
    {
        $allHouses = $user->guest;
        $allHouses->push($user->house);
        $this->result = $allHouses;
    }

    public function createHouse($data)
    {
        $this->validate($data);
        if ($this->hasErrors()) return;
        $this->result = $this->model->create($data);
    }

    public function addGuest($user, $guestId)
    {
        $this->result = HouseGuest::updateOrCreate(['house_id' => $user->house->id, 'user_id' => (int)$guestId]);
    }
}
