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

    public function getGuests($ownerId)
    {
        $house = $this->houseOfUser($ownerId);
        $this->result = $house->guests;
    }

    public function getPetsOfHouse($houseId)
    {
        $this->result = $this->model->find($houseId)->pets;
    }

    public function createHouse($data)
    {
        $this->validate($data);
        if ($this->hasErrors()) return;
        $this->result = $this->model->create($data);
    }

    public function addGuest($userId, $guestId)
    {
        $house = $this->houseOfUser($userId);
        $this->result = HouseGuest::updateOrCreate(['house_id' => $house->id, 'user_id' => (int)$guestId]);
    }
}
