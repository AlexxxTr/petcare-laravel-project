<?php 

namespace App\Modules\Houses\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Houses\Models\House;
use App\Modules\Houses\Models\HouseGuest;

class HouseService extends Service {
    protected $rules = [
        "name" => ["string", "required"]
    ];

    public function __construct(House $model)
    {
        parent::__construct($model);
    }

    public function houseOfUser($id) {
        $house = $this->model->where('owner', '=', $id)->firstOrFail();
        return $house;
    }

    public function getGuests($ownerId) {
        $house = $this->model->where('owner', '=', $ownerId)->firstOrFail();
        return HouseGuest::where('house_id', '=', $house->id)->get();
    }
}