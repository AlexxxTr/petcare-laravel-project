<?php 

namespace App\Modules\Houses\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Houses\Models\House;

class HouseService extends Service {
    protected $rules = [
        "name" => ["string", "required"]
    ];

    public function __construct(House $model)
    {
        parent::__construct($model);
    }

    public function HouseOfUser($id) {
        $house = $this->model->where('owner', '=', $id)->firstOrFail();
        return $house;
    }
}