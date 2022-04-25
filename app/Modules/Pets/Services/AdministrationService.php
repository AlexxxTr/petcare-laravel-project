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
        return $this->model->where(['pet_id' => $petId])->get();
    }
}
