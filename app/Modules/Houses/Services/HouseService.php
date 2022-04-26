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
        return $this->model->with('owner')->where(['owner' => $id])->firstOrFail();
    }

    public function getGuests($ownerId)
    {
        return $this->houseOfUser($ownerId)->guests;
    }

    public function getPetsOfHouse($houseId)
    {
        return $this->model->find($houseId)->pets;
    }

    public function createHouse($data)
    {
        $this->validate($data);
        if ($this->hasErrors()) return $this->getErrors();
        return $this->model->create($data);
    }

    public function addGuest($data)
    {
        return HouseGuest::updateOrCreate($data);
    }
}
