<?php

namespace App\Modules\Pets\Services;

use App\Modules\Core\Services\Service;
use App\Modules\Pets\Models\Administration;

class AdministrationService extends Service
{
    protected $rules = [
        "pet_id" => ["required", "integer"],
        "date" => ["required", "date"],
        "meal" => ["required", "string"],
        "notes" => ["required", "string"],
        "medicine_id" => ["required", "integer"],
    ];

    public function __construct(Administration $model)
    {
        parent::__construct($model);
    }

    public function getPetAdministrations($petId)
    {
        return $this->model->with(['pet', 'medicine'])->where(['pet_id' => $petId])->get();
    }

    public function getHouseAdministrations($houseId)
    {
        return $this->model->with(['pet', 'medicine'])->get(); // TODO: Ask about nested where clause
    }
}
